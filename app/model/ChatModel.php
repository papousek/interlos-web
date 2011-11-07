<?php
class ChatModel extends AbstractModel {

	public function find($id) {
		$this->checkEmptiness($id, "id");
		return $this->findAll()->where("[id_chat] = %i", $id)->fetch();
	}

	/**
	 * @return DibiDataSource
	 */
	public function findAll() {
		return $this->getConnection()->dataSource("SELECT * FROM [view_chat]");
	}

	public function insert($team, $content) {
		$this->checkEmptiness($team, "team");
		$this->checkEmptiness($content, "content");
		$return = $this->getConnection()->insert("chat", array(
				"id_team"	=> $team,
				"content"	=> $content,
				"inserted"	=> new DateTime()
				))->execute();
		$this->log($team, "chat_inserted", "The team successfuly contributed to the chat.");
		return $return;
	}
}
