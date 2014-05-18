<?php
/**
 * 一个页面类，组装页面元素
 * @author john
 * @mail ucanup@gmail.com
 * 2014-05-17
 */

class page {

    /**
     * 网页元素
     */

    public $_type = 'html';
    public $_coding = 'utf-8';
    public $_headers = array();
    public $_css = array();
    public $_javascript = array();
    public $_top = false;
    public $_bottom = false;
    public $_content = array();
    public $_sidebar = false;

    /**
     * 接收的数据
     */

    public $_request = array();

    public function __construct($act){
       // $this->_request = array_merge($_GET, $_POST);
       //if ($act){
            $error = new errorPage();
            $error->view();
       // }
    }

    public function _set(){
    }


    public function view(){
        ob_start();
        if ($this->_type == 'html'){
            echo '<!DOCTYPE html>';
            $this->_html();
        } elseif ($this->_type == 'xml'){
            echo '<?xml version="1.0" encoding="' . $this->_coding . '"?>';
            $this->_xml();
        } else {
            $this->_other();
        }
        ob_end_flush();
        exit;
    }

    /**
     * html页面
     */
    public function _html(){
        echo '<html><head>';
        echo '<meta http-equiv="Content-Type" content="text/html; charset=' . $this->_coding . '" />';
        if (!empty($this->_headers)){
            foreach($this->_headers as $h){
                echo $h;
            }
        }
        if (!empty($this->_css)){
            foreach($this->_css as $c){
                echo '<link href="' . CSSPATH . $c . '" rel="stylesheet" type="text/css" />';
            }
        }
        if (!empty($this->_javascript)){
            foreach($this->_javascript as $j){
                echo '<script type="text/javascript" src="'. JSPATH . $j . '"></script>';
            }

        }
        echo '</head><body>';
        $this->_makeContent();
        echo '</body></html>';
    }

    /**
     * 拼接内容
     */
    public function _makeContent(){
        var_dump($this->_request);
    }

    public function _img($img, $css = false){
        echo '<img ';
        if ($css){
            echo 'class="' . $css . '" ';
        }
        echo 'src="'. IMGPATH . $img . '" />';
    }
    public function _div($div, $css = false, $id = false){
        echo '<div ';
        if ($css){
            echo 'class="' . $css . '" ';
        }
        if ($id){
            echo 'id="' . $id .  '"';
        }
        echo '/>';
        echo $div;
        echo '</div>';
    }
}
