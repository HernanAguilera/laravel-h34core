<?php namespace H34\Core\Admin\Models\Form\FormItem;

use SleepingOwl\Admin\Models\Form\Interfaces\FormItemInterface;
use SleepingOwl\Admin\Models\Form\FormItem\MultiSelect;

/**
 * MultiSelectAdd
 */
class MultiSelectAdd extends MultiSelect implements FormItemInterface
{
    /**
	 * @var string
	 */
	protected $name;
	/**
	 * @var string
	 */
	protected $label;
    /**
	 * @var mixed
	 */
	protected $default;
    /**
	 * @var string
	 */
	protected $type;

    public function render()
    {
        if (is_array($this->list))
		{
			$list = $this->list;
			$list = array_combine($list, $list);
		} else
		{
			if ( ! method_exists($this->list, 'getList'))
			{
				throw new \Exception('You must implement "public static function getList()" in "' . $this->list . '"');
			}
			$list = forward_static_call([
				$this->list,
				'getList'
			]);
		}
        if ( ! isset($this->attributes['class']))
		{
			$this->attributes['class'] = '';
		}
		$this->attributes['class'] .= ' multiselect';
		$this->attributes['multiple'] = true;

        \AssetManager::addScript(\URL::asset('packages/h34/core/js/admin/multiselect_add.js'));

        // Obtener formulario de la clase desplegada en el select
        $instance = \Admin::instance()->formBuilder->getModel();
        $form = \Admin::instance()->models->modelWithClassname($this->list)->getForm();
        $form->setErrors(\Session::get('errors'));
        $form->setInstance(new $this->list);

        // Obteer id de la clase desplegada en el select para colocar en el modal
        preg_match('/(?P<patron>\w+)\[\]$/', $this->name, $result);
        $id = $result['patron'];

        // Generar el select con el boton para agregar nuevos elementos
        $select = $this->formBuilder->select($this->name, $list, $this->values(), $this->attributes);
        $select .= $this->formBuilder->button('<i class="fa fa-plus-circle"></i>', ['class' => 'btn btn-success', 'data-toggle' => 'modal',  'data-target' => '#'.$id]);
        $select = '<div>'. $select .'</div>';

        // renderizar nuevo control con modal
        $render = $this->formBuilder->makeGroup($this->name, $this->label, $select);
        $render .= $this->makeModal($id, $this->formRender($form));

        return $render;

        if ($instance->exists)
        {
            return "You are editing existing {$this->label}.";
        } else
        {
            return "You are creating new {$this->label}.";
        }
    }

    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

	/**
	 * @return string
	 */
	public function getName(){
        return $this->name;
    }

	/**
	 * @return array|null
	 */
	public function getValidationRules(){
        return [];
    }

    public function setDefault($default){
        $this->default = $default;
    }

	/**
	 * @return mixed
	 */
	public function getDefault(){
        return $this->default;
    }

	/**
	 * @param array $data
	 */
	public function updateRequestData(&$data){
        return '';
    }


    public function type($type)
    {
        $this->type = $type;
        return $this;
    }
    public function name($name)
    {
        $this->name = $name . '[]';
        return $this;
    }
    public function label($label)
    {
        $this->label = $label;
        return $this;
    }

    public function singularName($singularName){
        $this->singularName = $singularName;
        return $this;
    }

    public function makeModal($id, $body){
        $html = '<div id="'.$id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">';
        $html .= '    <div class="modal-dialog modal-lg">';
        $html .= '        <div class="modal-content">';
        $html .= '            <div class="modal-header">';
        $html .= '                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        $html .= '                <h4 class="modal-title">Agregar '.$this->singularName.'</h4>';
        $html .= '            </div>';
        $html .= '            <div class="modal-body">';
        $html .=  $body;
        $html .= '            </div>';
        $html .= '            <div class="modal-footer">';
        $html .= '                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>';
        $html .= '                <button type="button" class="btn btn-primary submit" data-submit="'.$id.'">Guardar cambios</button>';
        $html .= '            </div>';
        $html .= '        </div>';
        $html .= '    </div>';
        $html .= '</div>';
        return $html;
    }

    public function formRender($form){
        $content = [];
        foreach ($form->getItems() as $item)
		{
			$content[] = $item->render();
		}
        return implode('', $content);
    }

}
