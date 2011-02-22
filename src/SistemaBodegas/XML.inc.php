<?php
#$Id$

/*
* XML.inc.php
*
* Class to convert an XML file into an object
*
* Copyright (C) 2006  Oliver Strecke <oliver.strecke@browsertec.de>
*
*   This library is free software; you can redistribute it and/or
*   modify it under the terms of the GNU Lesser General Public
*   License as published by the Free Software Foundation; either
*   version 2 of the License, or (at your option) any later version.
*
*   This library is distributed in the hope that it will be useful,
*   but WITHOUT ANY WARRANTY; without even the implied warranty of
*   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
*   Lesser General Public License for more details.
*
*   You should have received a copy of the GNU Lesser General Public
*   License along with this library; if not, write to the Free Software
*   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307  USA
*/

class XML{
	var $_parser;
	var $_xml_data;
	var $_actual_tag;

	//Constructor...
	function xml($encoding="ISO-8859-1"){
    $this->_parser=xml_parser_create($encoding);
    $this->_xml_data="";
    $this->_actual_tag=$this;

    xml_set_object($this->_parser,$this);
    xml_parser_set_option($this->_parser,XML_OPTION_CASE_FOLDING,false);
    xml_set_element_handler($this->_parser,"tag_open","tag_close");
    xml_set_character_data_handler($this->_parser,"tag_data");
    xml_set_default_handler($this->_parser,"tag_data");
	}

	//get XML data from file...
	function file_read($xml_file){
		if(file_exists($xml_file)){
			$this->_xml_data=implode("",file($xml_file));
			return 1;
		}else{
			return 0;
		}

	}

	//parse XML data...
	function parse($xml_data=0){
		if($xml_data)$this->_xml_data=$xml_data;
		xml_parse($this->_parser,$this->_xml_data);
	  xml_parser_free($this->_parser);
	  return 1;
	}

  function tag_open($parser,$name,$attrs){
  	//create new tag...
  	#$actual_tag=&$this->_actual_tag;
   	$tag=new XML_TAG($this->_actual_tag);
   	$tag->_name=$name;
   	$tag->_param=$attrs;
   	if($name=="br" && isset($this->_actual_tag->_value))$this->_actual_tag->_value=$this->_actual_tag->_value."\n"; else $this->_actual_tag->_value="\n";

   	//add tag object to parent/actual tag object...
   	#if(is_object($this->_actual_tag)){
   	if(!is_a($this->_actual_tag,"XML")){
  	#if(is_object($this->_actual_tag->$name) || is_array($this->_actual_tag->$name)){
   		if(isset($this->_actual_tag->$name)){
   			//same child objects -> Array...
   			$last_index=$this->_actual_tag->new_child_array($tag,$name);
   			$this->_actual_tag=&$this->_actual_tag->{$name}[$last_index];
   		}else{
   			//add new child object to actual tag...
   			$this->_actual_tag->new_child($tag,$name);
  	    $this->_actual_tag=&$this->_actual_tag->$name;
   		}
   	}else{
   		//copy first tag object in this object...
   		$this->$name=$tag;
   		$this->_actual_tag=&$this->{$name};
   	}
   	return 1;
  }

  function tag_data($parser,$string){
   	if(strlen(trim($string))>0){
   	  if(isset($this->_actual_tag->_value))$this->_actual_tag->_value=$this->_actual_tag->_value.$string; else $this->_actual_tag->_value=$string;
   	}
    return 1;
  }

  function tag_close($parser,$name){
    $this->_actual_tag=&$this->_actual_tag->_parent;
    return 1;
  }

  function file_write($xml_file){
    $fp=fopen($xml_file,"w");
    preg_match_all("/\<\?xml(.*)\?\>/",$this->_xml_data,$result_array);
    if(is_array($result_array)){
      foreach($result_array[1] as $header){
        fputs($fp,"<?xml$header?>\n");
      }
    }
    $this->tag_write($fp,$this);
    fclose($fp);
    return 1;
  }

  function tag_write($fp,$tag,$indent=0){
    $return=0;
    $tmp_array=get_object_vars($tag);
    $indent_string="";
    for($i=0;$i<$indent;$i++)$indent_string.="  ";
    foreach($tmp_array as $tag_name=>$tag){
      if(is_a($tag,"XML_TAG") && substr($tag_name,0,1)!="_"){
        $return=1;
        fputs($fp,"\n$indent_string<$tag_name");
        foreach($tag->_param as $name=>$value){
          fputs($fp," $name='".htmlentities($value)."'");
        }
        fputs($fp,">");
        $result=$this->tag_write($fp,$tag,$indent+1);
        if($result){
          fputs($fp,"\n");
          fputs($fp,"$indent_string</$tag_name>");
        }else{
          fputs($fp,htmlentities($tag->_value));
          fputs($fp,"</$tag_name>");
        }
      }else if(is_array($tag) && substr($tag_name,0,1)!="_"){
        $return=1;
        foreach($tag as $i=>$tmp_tag){
          fputs($fp,"\n$indent_string<$tag_name");
          foreach($tmp_tag->_param as $name=>$value){
            fputs($fp," $name='".htmlentities($value)."'");
          }
          fputs($fp,">");
          $result=$this->tag_write($fp,$tmp_tag,$indent+1);
          if($result){
            fputs($fp,"\n");
            fputs($fp,"$indent_string</$tag_name>");
          }else{
            fputs($fp,htmlentities($tmp_tag->_value));
            fputs($fp,"</$tag_name>");
          }
        }
      }
    }
    return $return;
  }

	//Debug...
	function debug($exit=0){
		echo "<pre>";
		print_r($this);
		echo "</pre>";
		if($exit)exit;
	}
}

class XML_TAG{
	var $_parent;
	var $_name;
	var $_value;
	var $_param;

	//Constructor...
	function xml_tag(&$parent){
    $this->_parent=&$parent;
		$this->_name="";
		$this->_value=false;
		$this->_param=Array();
		return 1;
	}

	//simply add new child to this object...
	function new_child($child,$child_name){
	  if(isset($this->$child_name)){
      $this->new_child_array($child,$child_name);
	  }else{
  	  $this->$child_name=&$child;
	  }
	}

	//add child array for more same childs to this object...
	function new_child_array($child,$child_name){
		//create array and set old child object to the first array element...
		if(is_object($this->$child_name)){
			$tmp_obj=$this->$child_name;
			$this->$child_name=Array();
			$this->new_child_array($tmp_obj,$child_name);
		}
		//push child reference into child array...
		$this->{$child_name}[]=&$child;
		$last_index=count($this->$child_name)-1;
		return $last_index;
	}

	//Debug...
	function debug(){
	  echo "<pre>";
	  print_r($this);
	  echo "</pre>";
	}
}
?>