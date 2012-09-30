<?php



/**
 * This class defines the structure of the 'sf_guard_group_permission' table.
 *
 *
 * This class was autogenerated by Propel 1.6.4 on:
 *
 * Sun Sep 30 15:11:47 2012
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.sfGuardPlugin.lib.model.map
 */
class sfGuardGroupPermissionTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sfGuardPlugin.lib.model.map.sfGuardGroupPermissionTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
		// attributes
		$this->setName('sf_guard_group_permission');
		$this->setPhpName('sfGuardGroupPermission');
		$this->setClassname('sfGuardGroupPermission');
		$this->setPackage('plugins.sfGuardPlugin.lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('GROUP_ID', 'GroupId', 'INTEGER' , 'sf_guard_group', 'ID', true, null, null);
		$this->addForeignPrimaryKey('PERMISSION_ID', 'PermissionId', 'INTEGER' , 'sf_guard_permission', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('sfGuardGroup', 'sfGuardGroup', RelationMap::MANY_TO_ONE, array('group_id' => 'id', ), 'CASCADE', null);
		$this->addRelation('sfGuardPermission', 'sfGuardPermission', RelationMap::MANY_TO_ONE, array('permission_id' => 'id', ), 'CASCADE', null);
	} // buildRelations()

} // sfGuardGroupPermissionTableMap
