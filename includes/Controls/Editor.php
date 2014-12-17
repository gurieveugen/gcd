<?php
namespace Controls;

class Editor extends Control{	
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	public function __construct($title, $meta_hidden = array(), $meta_visible = array())
	{	
		$meta_visible = array_merge(
			array(		
				'textarea_rows' => 8,						
				'editor_class' => 'widefat'				
			), 
			$meta_visible
		);
		parent::__construct($title, $meta_hidden, $meta_visible);	
	}

	/**
	 * Get controls name
	 * @return stromg --- control name
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set name ( slug ) object
	 * @param string $name --- name to set
	 */
	public function setName($name)
	{
		$name = (string) $name;
		$this->name = ($name != '') ? $name : \__::formatName($this->title);
		$this->meta_visible['textarea_name'] = $this->name;
	}

	/**
	 * Get wp editor
	 * @param  string $value --- editor value
	 * @return string --- HTML code
	 */
	private function getEditor($value)
	{
		ob_start();
		wp_editor(
			(string) $value, 
			$this->name, 
			\__::joinArray($this->getMetaVisible())
		);
		$var = ob_get_contents();
		ob_end_clean();
		return $var;
	}

	/**
	 * Get html code
	 * @param  string $value --- value
	 * @return string        --- HTML code
	 */
	public function getHTML($value = null)
	{			
		return $this->getTitleHTML().$this->getEditor($value).$this->getDescriptionHTML();
	}
}