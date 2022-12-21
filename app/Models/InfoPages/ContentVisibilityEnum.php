<?php
  
namespace App\Models\InfoPages;
 
enum ContentVisibilityEnum:string {
    case Public = 'public';
    case ForMember = 'member';    
    case ForDepartment = 'department';
}