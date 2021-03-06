<?php 

require_once(plugin_dir_path(__FILE__) . 'fsWPListTableBase.class.php');

class fsShortcodeListTable extends fsWPListTableBase{
	
	private $_data;
				
	function __construct(&$data)
	{

		global $status, $page;

        parent::__construct(array(
            'singular' => '',   
            'plural' => 'fs-sortable-table',  
            'ajax' => false      	
		));
		
		$this->_data = $data;
	}

	function get_columns()
	{
	
		$columns = array(
			'name' => 'Name',
			'shortcode' => 'Shortcode',
			'lastupdated' => 'Last Updated',
			'type' => 'Type',
			'cached' => 'Cached',
			'actions' => 'Actions'
		);
		
		return $columns;
	}

	function prepare_items() 
	{
	
		$columns = $this->get_columns();
		$hidden = array();
		$sortable = $this->get_sortable_columns();
		$this->_column_headers = array($columns, $hidden, $sortable);
		
		if(!empty($_GET['orderby']) && !empty($_GET['order']))
			usort( $this->_data, array( &$this, 'usort_reorder' ) );
		
		$this->items = $this->_data;
	}

	function column_default($item, $column_name) 
	{
		
		switch($column_name) {
			case 'name':
			case 'shortcode':
			case 'lastupdated':
			case 'type':
			case 'cached':
			case 'actions':
				return $item[ $column_name ];
			default:
				return 'An unknown error has occured';
		}
	}

	function get_sortable_columns() 
	{
	 
		$sortable_columns = array(
			'name'  => array('name', false),
			'shortcode' => array('shortcode', false),
			'lastupdated' => array('lastupdated', false),
			'type' => array('type', false),
			'cached'   => array('cached', false)
		);
	  
		return $sortable_columns;
	}

	function usort_reorder( $a, $b ) 
	{
	
		// If no sort, default to title
		$orderby = (!empty($_GET['orderby'])) ? $_GET['orderby'] : 'name';
		// If no order, default to asc
		$order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'asc';
		// Determine sort order
		$result = strcmp( $a[$orderby], $b[$orderby] );
		// Send final sort direction to usort
		return ($order === 'asc') ? $result : -$result;
	}
	
	//add id to table rows
	function single_row( $item ) 
	{
	
		static $row_class = '';
		$row_class = ( $row_class == '' ? ' class="alternate"' : '' );

		echo '<tr id="' . $item['ID'] . '" ' . $row_class . '>';
		$this->single_row_columns( $item );
		echo '</tr>';
	}
	
	//remove tablenav elements
	function display_tablenav( $which ) {}
}

?>