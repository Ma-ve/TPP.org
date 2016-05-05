<?php

class SiteController extends Controller
{

	public function actionIndex() {
		$this->render('layouts/header');

		$this->render('general/index', [
			'general'  => $this->getGeneral(),
			'messages' => $this->getMessages(),
		], true);

		$this->render('pokemon/index', [
			'pokemon' => Pokemon::getPartyPokemon(),
			'owned'   => $this->getGeneral()->pokedex_owned,
			'seen'    => $this->getGeneral()->pokedex_seen,
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

		$boxPokemon = Pokemon::getBoxPokemon();
		$this->render('pokemon_box/index', [
			'pokemon' => $boxPokemon,
		], true);

		$this->render('pokemon_boxes/index', [
			'boxes' => $this->orderBoxPokemon($boxPokemon),
		], true);

		$this->render('pokemon_daycare/index', [
			'pokemon' => Pokemon::getDaycarePokemon(),
		], true);

		$this->render('item/index', [
			'items' => Item::getAllItems(),
		], true);

		$this->render('pokemon_history/index', [
			'pokemon' => Pokemon::getHistoryPokemon(),
		], true);

		$this->render('milestone/index', [
			'milestones' => Milestone::getMilestones(),
		], true);

		$this->render('fact/index', [
			'facts' => Fact::getFacts(),
		], true);

		$this->render('credit/index', [
			'credits' => Credit::getCredits(),
		], true);

		$this->render('layouts/footer');
	}

	/**
	 * @param $box_pokemon Pokemon[]
	 *
	 * @return array
	 */
	private function initOrderBoxPokemon($box_pokemon) {
		$boxes = [];
		foreach(Box::getBoxes() as $box) {
			$boxes[$box->id] = $box;
		}

		foreach($box_pokemon as $pokemon) {
			$boxes[$pokemon->box]->pokemon[] = $pokemon;
		}
		ksort($boxes);

		return $boxes;
}

	/**
	 * @param $boxPokemon Pokemon[]
	 *
	 * @return array
	 */
	private function orderBoxPokemon($boxPokemon) {
		$boxes = $this->initOrderBoxPokemon($boxPokemon);
		/**
		 * @var $box Box
		 */
		foreach($boxes as &$box) {
			$chunks = array_chunk($box->pokemon, Pokemon::BOXES_ROWS);
			if(empty($chunks)) {
				continue;
			}
			foreach($chunks as $row => $chunk) {
				foreach($chunk as $pokemon) {
					$box->content[$row][] = $pokemon;
				}
			}
		}

		return $boxes;
	}
	/**
	 * @return stdClass
	 */
	public function getGeneral() {
		$getGeneral = TPP::db()
						 ->query("SELECT `name`, `value` FROM `general` WHERE `value` != ''") or die(TPP::db()->error);
		$model = new stdClass();
		while($general = $getGeneral->fetch()) {
			$model->$general['name'] = utf8_encode(stripslashes($general['value']));
		}
		if(isset($model->notice)) {
			$model->notices = $this->getNotices($model->notice);
		}

		return $model;
	}

	/**
	 * @param string $notices
	 *
	 * @return array
	 */
	public function getNotices($notices) {
		return explode('%%%', $notices);
	}

	/**
	 * @return array
	 */
	public function getMessages() {
		$getMessages = TPP::db()->prepare("
 SELECT m.`id`, m.`message`, m.`sent_user`, s.`suggestion`
 FROM `message` m
 LEFT JOIN `suggestion` s ON m.`suggestion_id` = s.`id`
 WHERE m.`read` = 0 AND m.`ip` = :ip
 ORDER BY `date_created` ASC
 LIMIT 1") or die(TPP::db()->error);
		$getMessages->execute([
								  ':ip' => $_SERVER['REMOTE_ADDR'],
							  ]);

		if($getMessages->rowCount() > 0) {
			while($m = $getMessages->fetch()) {
				$return = [
					'message'    => $m['message'], 'id' => $m['id'], 'sentUser' => $m['sent_user'],
					'suggestion' => $m['suggestion'],
				];
			}

			return $return;
		}
	}

}
