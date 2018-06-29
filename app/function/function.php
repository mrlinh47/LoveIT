<?php

// Mở composer.json
// Thêm vào trong "autoload" chuỗi sau
// "files": [
//         "app/function/function.php"
// ]

// Chạy cmd : composer  dumpautoload

function menuMulti($data,$parent_id=0,$str="",$select =0){
	foreach ($data as $val) {
		$id= $val['id'];
		$name =$val['name'];
		if($val['parent_id'] == $parent_id){
			if($select !=0 && $id == $select){
				echo '<option value="'.$id.'" selected>'.$str.$name.'</option>';
			}else{
				echo '<option value="'.$id.'">'.$str.$name.'</option>';
			}
			menuMulti($data,$id,$str."--",$select);
		}
	}
}

function listCate($data,$parent=0,$str=""){
	foreach ($data as $val) {
		$id= $val['id'];
		$name =$val['name'];
		if($val['publish'] == '1'){
			$active ="fa-check icon-active";
		}else{
			$active="fa-times icon-inactive";
		} 
		 



		if($val['publish'] == 1){
			$icon='<a href="" class="text-success"><i class="fa fa-check" aria-hidden="true"></i></a>';
		}else{
			$icon='<a href="" class="text-danger"><i class="fa fa-times" aria-hidden="true"></i></a>';
		}
		if($val['parent_id'] == $parent){
			echo '<tr class="odd gradeX" align="center">';
           if($str == ""){
           	echo '<td class="text-left"><a href="edit/'.$id.'"><b>'.$str.$name.'</b></a></td>';
           }else{
           	echo '<td class="text-left"><a href="edit/'.$id.'">'.$str.$name.'</a></td>';
           }
       
            echo '<td class="center">
            <a href="javascript:void(0);" id="chang-status-cate" data-id="'.$id.'"><i class="fa '.$active.'" aria-hidden="true" id="id-'.$id.'"></i>
        </a>
        <input type="hidden" name="_token" id="csrf-token" value="'.Session::token().'" />
        </td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="edit/'.$id.'">Edit</a></td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="delete/'.$id.'" onclick="return xacnhanxoa(\'Bạn có chắc muốn xóa không?\')"> Delete</a></td>
            <td>'.$id.'</td>
        </tr>';
        listCate($data,$id,$str."--");
		}
		//$stt++;
	}
}
?>