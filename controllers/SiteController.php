<?php

class SiteController extends Controller {


	public function actionIndex() {
		$this->render('layouts/header');

		$this->render('general/index', [
			'general' => $this->getGeneral(),
			'messages' => $this->getMessages(),
		], true);

		$this->render('pokemon/index', [
			'pokemon' => Pokemon::getPartyPokemon(),
			'owned' => $this->getGeneral()->pokedex_owned,
			'seen' => $this->getGeneral()->pokedex_seen
		], true);

		$badges = Badge::getBadges(null, 'LIMIT 0, 8');

		if($badges['obtained'] == 8) {
//			$this->render('elitefour/index', [
//				EliteFour::getEliteFour(),
//			]);
		}
		$this->render('badge/index', [
			'badges' => $badges,
		], true);

		$this->render('pokemon_box/index', [
			'pokemon' => Pokemon::getBoxPokemon()
		], true);

		$this->render('pokemon_daycare/index', [
			'pokemon' => Pokemon::getDaycarePokemon()
		], true);

		$this->render('item/index', [
			'items' => Item::getAllItems()
		], true);

		$this->render('pokemon_history/index', [
			'pokemon' => Pokemon::getHistoryPokemon()
		], true);

		$this->render('milestone/index', [
			'milestones' => Milestone::getMilestones()
		], true);

		$this->render('fact/index', [
			'facts' => Fact::getFacts()
		], true);

		$this->render('credit/index', [
			'credits' => Credit::getCredits()
		], true);

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
				$return = ['message' => $message, 'id' => $messageId, 'sentUser' => $sentUser, 'suggestion' => $suggestion];
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
