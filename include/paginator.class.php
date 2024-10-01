<?php
/*
 * PHP Pagination Class with Bootstrap 4
 * @version 1.0.0
 */
class Paginator
{
    public $items_per_page;
    public $items_total;
    public $current_page;
    public $num_pages;
    public $mid_range;
    public $low;
    public $limit;
    public $return;
    public $default_ipp;
    public $querystring;
	public $start_range;
	public $end_range;
    public $ipp_array;
    public $ipp;

    public function __construct()
    {
        $this->current_page = 1;
        $this->mid_range = 7;
        $this->ipp_array = array(10, 25, 50, 100, 150, 200, 'All');
        $this->default_ipp = 25;
        $this->items_per_page = (!empty($_GET['ipp']) && in_array($_GET['ipp'], $this->ipp_array)) ? $_GET['ipp'] : $this->default_ipp;
    }

    public function paginate()
    {
        $this->items_total = $this->items_total ?? 0;
        $this->num_pages = ($this->items_per_page == 'All') ? 1 : ceil($this->items_total / $this->items_per_page);
        $this->current_page = (isset($_GET['page']) && $_GET['page'] > 0) ? (int)$_GET['page'] : 1;

        $prev_page = max(1, $this->current_page - 1);
        $next_page = min($this->num_pages, $this->current_page + 1);

        $this->querystring = $_SERVER['QUERY_STRING'];
        $this->querystring = preg_replace('/&page=[^&]*/i', '', $this->querystring);
        $this->querystring = preg_replace('/&ipp=[^&]*/i', '', $this->querystring);

        $this->return = "<div class='row'><div class='col-sm-7'><ul class='pagination'>";
        $this->return .= ($this->current_page > 1 && $this->items_total >= 10) ? "<li class='page-item'><a class='page-link' href='{$_SERVER['PHP_SELF']}?page=$prev_page&ipp=$this->items_per_page&{$this->querystring}'>Previous</a></li>" : "<li class='page-item disabled'><span class='page-link'>Previous</span></li>";

        if ($this->num_pages > 1) {
            $this->start_range = max(1, $this->current_page - floor($this->mid_range / 2));
            $this->end_range = min($this->num_pages, $this->current_page + floor($this->mid_range / 2));

            for ($i = $this->start_range; $i <= $this->num_pages; $i++) {
                if ($i > 0) {
                    if ($i == $this->current_page) {
                        $this->return .= "<li class='page-item active'><span class='page-link'>$i</span></li>";
                    } else {
                        $this->return .= "<li class='page-item'><a class='page-link' href='{$_SERVER['PHP_SELF']}?page=$i&ipp=$this->items_per_page&{$this->querystring}'>$i</a></li>";
                    }
                }
            }
        }

        $this->return .= ($this->current_page < $this->num_pages && $this->items_total >= 10) ? "<li class='page-item'><a class='page-link' href='{$_SERVER['PHP_SELF']}?page=$next_page&ipp=$this->items_per_page&{$this->querystring}'>Next</a></li>" : "<li class='page-item disabled'><span class='page-link'>Next</span></li>";

        $this->return .= "</ul></div></div>";
    }

    public function display_items_per_page()
    {
        $items = '';
        foreach ($this->ipp_array as $ipp_opt) {
            $selected = ($ipp_opt == $this->items_per_page) ? "selected" : "";
            $items .= "<option value='$ipp_opt' $selected>$ipp_opt</option>";
        }
        return "<div class='col-sm-5 float-sm-right'><div class='form-row mt-2 text-right'><div class='col'><span class='text-muted'>Rows:</span> <select class='border rounded text-muted' onchange=\"window.location='{$_SERVER['PHP_SELF']}?page=1&ipp='+this.value+'&{$this->querystring}';return false\">$items</select></div></div></div>";
    }

    public function display_jump_menu()
    {
        $option = '';
        for ($i = 1; $i <= $this->num_pages; $i++) {
            $selected = ($i == $this->current_page) ? "selected" : "";
            $option .= "<option value='$i' $selected>$i</option>";
        }
        return "<div class='col'><span class='text-muted'>Page:</span> <select class='border rounded text-muted' onchange=\"window.location='{$_SERVER['PHP_SELF']}?page='+this.value+'&ipp=$this->items_per_page&{$this->querystring}';return false\">$option</select></div><div class='col'><strong class='text-danger'>Total: {$this->items_total}</strong></div></div></div></div>";
    }

    public function display_pages()
    {
        return $this->return;
    }
}
?>