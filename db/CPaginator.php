<?php
class CPaginator {
	// Public variables
	public $range;	// Number of items shown in the paginator
	public $itemsPerPage; // Items shown in the view
	public $navigation; // Text for pre and next buttons
	// Private variables
	private $_total; // Total number of records
	private $_currentPage; // Current page of pagination
	private $_link;	// URL of the current page
	private $_pagingHtml; // Pagination html

	public function __construct() {
		// Set default values		
		$this->range = 10;
		// $this->itemsPerPage = (!empty($_SESSION['items_per_page']))?$_SESSION['items_per_page']:5;
		$this->itemsPerPage = 10;
		$this->navigation = array(
			'next'=>NAVIGATION_NEXT,
			'prev'=>NAVIGATION_PREV
		);
		// Private values
		$this->_currentPage = 1;
		$this->_total = 0;
		$this->_link = filter_var(DOCUMENT_ROOT, FILTER_SANITIZE_STRING);
		$this->_pagingHtml = '';
	}
	// Parameter tells CPaginator class how many records we are trying to paginate
	public function paginate($total) {
		// Set total records
		$this->_total = $total;
		// Get current page
		if (isset($_GET['page'])) {
			$this->_currentPage = $_GET['page'];
		}
		// Get pagination html
		$this->_pagingHtml = $this->_get_page_nav();
	}
	// Gives the pagination HTML for displaying
	public function page_nav() {
		if(empty($this->_pagingHtml)) {
			exit('Please call function paginate() first.');
		}
		return $this->_pagingHtml;
	}
	// Gives the current page number
	public function get_current_page() {
		return $this->_currentPage;
	}
	//
	private function _get_page_nav() {
		// Page nav start and end
		list($start, $end) = $this->_start_end_page();
		return '<div class="container"><div class="row"><ul id="paginator" class="pagination pagination-sm">'.$this->_previous_link($start).$this->_page($start, $end).$this->_next_link($end).'</ul></div></div>';
	}
	//
	private function _start_end_page() {
		$totalPages = $this->_total_pages();
		// If no records
		if($totalPages<=0) {
			return array(1, 0);
		}
		// If only one records
		if ($totalPages < $this->range) {
			return array(1, $totalPages);
		}
		//
		$start = $this->_currentPage - floor($this->range/2);
		$end = $start + $this->range - 1;
		//
		if ($start < 1) {
			$start = 1;
		}
		//
		if ($end > $totalPages) {
			$end = $totalPages;
		}
		//
		if ($end < $this->range) {
            $end = $this->range;
        }
		//
		if ($end-$start < $this->range) {
			$start = $end - $this->range + 1;
		}
		//
		$result = array($start, $end);
		return $result;
	}
	// Create prev button
	private function _previous_link($start) {
		if ($this->_currentPage > $start) {
			return '<li><a href="'.$this->_link.'?page='.($this->_currentPage -1).'">'.$this->navigation['prev'].'</a></li>';
		}
		return '';
	}
	// Loop through page numbers
	private function _page($start, $end) {
		$result = '';
		for ($i=$start; $i<=$end; $i++) {
			$result.='<li '.(($i==$this->_currentPage)?'class="active"':"").'><a href="'.$this->_link.'?page='.$i.'">'.$i.'</a></li>';
		}
		return $result;
	}
	// Create next button
	private function _next_link($end) {
		if ($this->_currentPage < $end) {
			return '<li><a href="'.$this->_link.'?page='.($this->_currentPage +1).'">'.$this->navigation['next'].'</a></li>';
		}
		return '';
	}
	//
	private function _total_pages() {
		$totalPages = intval($this->_total / $this->itemsPerPage);
		if ($this->_total % $this->itemsPerPage !=0) {
			$totalPages++;
			return $totalPages;
		}
		return $totalPages;
	}
}

?>