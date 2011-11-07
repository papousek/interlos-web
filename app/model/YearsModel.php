<?php
class YearsModel extends AbstractModel {

	public function find($id) {
		$this->checkEmptiness($id, "id");
		$this->getConnection()->query("SELECT * FROM [year] WHERE [id_year] = %i", $id)->fetch();
	}

	/** @return DibiRow */
	public function findCurrent() {
		return $this->getConnection()->query("SELECT * FROM [view_current_year]")->fetch();
	}

	/** @return DibiDataSource */
	public function findAll() {
		return $this->getConnection()->dataSource("SELECT * FROM [year]");
	}

}
