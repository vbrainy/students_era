<?php

namespace common\models;

use Yii;

/**
 * This is the model class for collection "user_rules_menu".
 *
 * @property \MongoId|string $_id
 * @property mixed $category
 * @property mixed $parent_id
 * @property mixed $user_rules_id
 * @property mixed $label
 * @property mixed $class
 * @property mixed $url
 * @property mixed $position
 * @property mixed $status
 */
class UserRulesMenu extends \yii\mongodb\ActiveRecord
{

    const MENU_ACTIVE_STATUS = 1;
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return 'user_rules_menu';
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'category',
            'parent_id',
            'user_rules_id',
            'label',
            'class',
            'url',
            'position',
            'status',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category', 'parent_id', 'user_rules_id', 'label', 'class', 'url', 'position', 'status'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'category' => 'Category',
            'parent_id' => 'Parent ID',
            'user_rules_id' => 'User Rules ID',
            'label' => 'Label',
            'class' => 'Class',
            'url' => 'Url',
            'position' => 'Position',
            'status' => 'Status',
        ];
    }
    /***
    Get dynamic menu for frontend and backend
    {role_id} = set role id for who login.
    {category} = where is the show menu (Front top , front bottom , front middle , admin sidebar)
    {parent_id} = Get List of submenu then pass parent id.
    */
    public static function getMenu($category , $role_id){
        $Menutree = array() ;
        $amGetParentmenu = self::createTree($category , $role_id , '0');
        // p($amGetParentmenu);
        foreach ($amGetParentmenu as $key => $row) {
 
            $amParentMenu = array('label' => $row->label, 'url' => $row->url, '_id' => [$row->_id], 'parent_id' => $row->parent_id , 'class'=> $row->class);
            /*$amSubMenu = self::createTree($category , $role_id ,$row->_id);
            if(!empty($amSubMenu)){
                $Submenuitems = array();
                foreach ($amSubMenu as $submenukey => $submenuvalue) {
                    $Submenuitems[] = array('label' => $submenuvalue->label, 'url' => $submenuvalue->url, '_id' => $submenuvalue->_id, 'parent_id' => $submenuvalue->parent_id, 'class'=> $submenuvalue->class);
                }
                $amParentMenu['items'] = $Submenuitems;
            }*/
            $Menutree[] = $amParentMenu;
        }
        return  $Menutree;
    }

    /***
    create tree structure for menu.
    */
    public static function createTree($category ,$role_id ,$parent_id){
        $condition = [ 'status'=>self::MENU_ACTIVE_STATUS , 'category' => $category,'user_rules.role_id' => $role_id,'parent_id'=>$parent_id];
        //$tree = UserRulesMenu::find()->joinWith('userRules')->where($condition)->orderBy('position')->all();
        $ssSql = "SELECT * FROM user_rules_menu WHERE 
                        category = '".$category."' AND parent_id = '".$parent_id."' AND user_rules_id IN('SELECT id FROM user_rules')";
        
        $condition   = "status = ".self::MENU_ACTIVE_STATUS." 
                        AND category = '".$category."' 
                        AND parent_id = ".$parent_id." 
                        AND user_rules_id IN(SELECT id FROM user_rules where role_id=".$role_id.")";

        $tree = UserRulesMenu::find([$condition])->all();
        return $tree; 
    }


}
