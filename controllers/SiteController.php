<?php

class SiteController extends Controller {


	public function actionIndex() {
		$this->render('layouts/header');

		$this->render('general/index', array(
			'general' => $this->getGeneral(),
			'messages' => $this->getMessages(),
		), true);

		$this->render('pokemon/index', array(
			'pokemon' => Pokemon::getPartyPokemon(),
			'owned' => $this->getGeneral()->pokedex_owned,
			'seen' => $this->getGeneral()->pokedex_seen
		), true);

		$this->render('badge/index', array(
			'badges' => [
				'Kanto' => Badge::getBadges(null, 'LIMIT 0, 8'),
				'Kanto (rematch)' => Badge::getBadges(null, 'LIMIT 8, 8'),
				'Johto' => Badge::getBadges(null, 'LIMIT 16, 8'),
				'Johto (rematch)' => Badge::getBadges(null, 'LIMIT 24, 8'),
			],
		), true);

		$this->render('pokemon_box/index', array(
			'pokemon' => Pokemon::getBoxPokemon()
		), true);

		$this->render('pokemon_daycare/index', array(
			'pokemon' => Pokemon::getDaycarePokemon()
		), true);

		$this->render('item/index', array(
			'items' => Item::getAllItems()
		), true);

		$this->render('pokemon_history/index', array(
			'pokemon' => Pokemon::getHistoryPokemon()
		), true);

		$this->render('milestone/index', array(
			'milestones' => Milestone::getMilestones()
		), true);

		$this->render('fact/index', array(
			'facts' => Fact::getFacts()
		), true);

		$this->render('credit/index', array(
			'credits' => Credit::getCredits()
		), true);

		$this->render('layouts/footer');
	}

	public function getMessages() {
//		$getMessages = TPP::db()->prepare("SELECT m.`id`, m.`message`, m.`sent_user`, s.`suggestion` FROM `message` m LEFT JOIN `suggestion` s ON m.`suggestion_id` = s.`id` ORDER BY `date_created` ASC LIMIT 1") or die(TPP::db()->error);
		$getMessages = TPP::db()->prepare("SELECT m.`id`, m.`message`, m.`sent_user`, s.`suggestion` FROM `message` m LEFT JOIN `suggestion` s ON m.`suggestion_id` = s.`id` WHERE m.`read` = 0 AND m.`ip` = ? ORDER BY `date_created` ASC LIMIT 1") or die(TPP::db()->error);
		$getMessages->bind_param('s', $_SERVER["REMOTE_ADDR"]);
		$getMessages->execute();
		$getMessages->bind_result($messageId, $message, $sentUser, $suggestion);
		$getMessages->store_result();

		if($getMessages->num_rows > 0) {
			while($getMessages->fetch()) {
				$return = array('message' => $message, 'id' => $messageId, 'sentUser' => $sentUser, 'suggestion' => $suggestion);
			}
			$getMessages->free_result();
			return $return;
		}
	}

	public function getGeneral() {
		$getGeneral = TPP::db()->query("SELECT `name`, `value` FROM `general` WHERE `value` != ''")or die(TPP::db()->error);
		$model = new stdClass();
		while($general = $getGeneral->fetch_assoc()) {
			$model->$general['name'] = utf8_encode(stripslashes($general['value']));
		}
		if(isset($model->notice)) {
			$model->notices = $this->getNotices($model->notice);
		}
		return $model;
	}

	public function getNotices($notices) {
		return explode('%%%', $notices);
	}

}
