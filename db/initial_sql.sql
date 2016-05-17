-- Server version: 10.0.20-MariaDB-cll-lve
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- Table structure for table `ability`
--

CREATE TABLE IF NOT EXISTS `ability` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `ability` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `description` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=192 ;

--
-- Dumping data for table `ability`
--

INSERT INTO `ability` (`id`, `ability`, `description`) VALUES
(1, 'Air Lock', 'Eliminates the effects of weather.'),
(2, 'Arena Trap', 'Prevents opposing Pokémon from fleeing.'),
(3, 'Battle Armor', 'Protects the Pokémon from critical hits.'),
(4, 'Blaze', 'Powers up Fire-type moves when the Pokémon is in trouble.'),
(5, 'Chlorophyll', 'Boosts the Pokémon\\''s Speed stat in sunshine.'),
(6, 'Clear Body', 'Prevents other Pokémon from lowering its stats.'),
(7, 'Cloud Nine', 'Eliminates the effects of weather.'),
(8, 'Color Change', 'The Pokémon\\''s type becomes the type of the move used on it.'),
(9, 'Compound Eyes', 'Boosts the Pokémon\\''s accuracy.'),
(10, 'Cute Charm', 'Contact with the Pok&eacute;mon may cause infatuation.'),
(11, 'Damp', 'Prevents the use of self-destructing moves.'),
(12, 'Drizzle', 'The Pokémon makes it rain when it enters a battle.'),
(13, 'Drought', 'Turns the sunlight harsh when the Pokémon enters a battle.'),
(14, 'Early Bird', 'The Pok&eacute;mon awakens quickly from sleep.'),
(15, 'Effect Spore', 'Contact may poison or cause paralysis or sleep.'),
(16, 'Flame Body', 'Contact with the Pokémon may burn the attacker.'),
(17, 'Flash Fire', 'Powers up the Pokémon\\''s Fire-type moves if it\\''s hit by one.'),
(18, 'Forecast', 'Castform transforms with the weather.'),
(19, 'Guts', 'Boosts the Attack stat if the Pokémon has a status condition.'),
(20, 'Huge Power', 'Boosts the Pokémon\\''s Attack stat.'),
(21, 'Hustle', 'Boosts the Attack stat, but lowers accuracy.'),
(22, 'Hyper Cutter', 'Prevents other Pokémon from lowering its Attack stat.'),
(23, 'Illuminate', 'Raises the likelihood of meeting wild Pok&eacute;mon.'),
(24, 'Immunity', 'Prevents the Pok&eacute;mon from getting poisoned.'),
(25, 'Inner Focus', 'Protects the Pokémon from flinching.'),
(26, 'Insomnia', 'Prevents the Pok&eacute;mon from falling asleep.'),
(27, 'Intimidate', 'Lowers the opposing Pokémon\\''s Attack stat.'),
(28, 'Keen Eye', 'Prevents other Pokémon from lowering accuracy.'),
(29, 'Levitate', 'Gives full immunity to all Ground-type moves.'),
(30, 'Lightning Rod', 'Draws in all Electric-type moves to boost its Sp. Atk stat.'),
(31, 'Limber', 'Protects the Pokémon from paralysis.'),
(32, 'Liquid Ooze', 'Damages attackers using any draining move.'),
(33, 'Magma Armor', 'Prevents the Pokémon from becoming frozen.'),
(34, 'Magnet Pull', 'Prevents Steel-type Pok&eacute;mon from escaping.'),
(35, 'Marvel Scale', 'Boosts the Defense stat if the Pokémon has a status condition.'),
(36, 'Minus', 'Boosts the Sp. Atk stat if another Pokémon has Plus or Minus.'),
(37, 'Natural Cure', 'All status conditions heal when the Pokémon switches out.'),
(38, 'Oblivious', 'Keeps the Pokémon from being infatuated or falling for taunts.'),
(39, 'Overgrow', 'Powers up Grass-type moves when the Pokémon is in trouble.'),
(40, 'Own Tempo', 'Prevents the Pok&eacute;mon from becoming confused.'),
(41, 'Pickup', 'The Pok&eacute;mon may pick up items.'),
(42, 'Plus', 'Boosts the Sp. Atk stat if another Pokémon has Plus or Minus.'),
(43, 'Poison Point', 'Contact with the Pokémon may poison the attacker.'),
(44, 'Pressure', 'The Pokémon raises opposing Pokémon\\''s PP usage.'),
(45, 'Pure Power', 'Boosts the Pokémon\\''s Attack stat.'),
(46, 'Rain Dish', 'The Pokémon gradually regains HP in rain.'),
(47, 'Rock Head', 'Protects the Pok&eacute;mon from recoil damage.'),
(48, 'Rough Skin', 'Inflicts damage to the attacker on contact.'),
(49, 'Run Away', 'Enables a sure getaway from wild Pok&eacute;mon.'),
(50, 'Sand Stream', 'The Pok&eacute;mon summons a sandstorm in battle.'),
(51, 'Sand Veil', 'Boosts the Pok&eacute;mon''s evasion in a sandstorm.'),
(52, 'Serene Grace', 'Boosts the likelihood of additional effects occurring.'),
(53, 'Shadow Tag', 'Prevents opposing Pokémon from escaping.'),
(54, 'Shed Skin', 'The Pok&eacute;mon may heal its own status conditions.'),
(55, 'Shell Armor', 'Protects the Pokémon from critical hits.'),
(56, 'Shield Dust', 'Blocks the additional effects of attacks taken.'),
(57, 'Soundproof', 'Gives full immunity to all sound-based moves.'),
(58, 'Speed Boost', 'Its Speed stat is gradually boosted.\n'),
(59, 'Static', 'Contact with the Pok&eacute;mon may cause paralysis.'),
(60, 'Stench', 'The stench may cause the target to flinch.'),
(61, 'Sticky Hold', 'Protects the Pok&eacute;mon from item theft.'),
(62, 'Sturdy', 'It cannot be knocked out with one hit.'),
(63, 'Suction Cups', 'Negates all moves and items that force switching out.'),
(64, 'Swarm', 'Powers up Bug-type moves when the Pokémon is in trouble.'),
(65, 'Swift Swim', 'Boosts the Pokémon\\''s Speed stat in rain.'),
(66, 'Synchronize', 'Passes poison, paralyze, or burn to the Pokémon that inflicted it.'),
(67, 'Thick Fat', 'Boosts resistance to Fire- and Ice-type moves.'),
(68, 'Torrent', 'Powers up Water-type moves when the Pokémon is in trouble.'),
(69, 'Trace', 'The Pokémon copies an opposing Pokémon\\''s Ability.'),
(70, 'Truant', 'The Pok&eacute;mon can''t attack on consecutive turns.'),
(71, 'Vital Spirit', 'Prevents the Pok&eacute;mon from falling asleep.'),
(72, 'Volt Absorb', 'Restores HP if hit by an Electric-type move.'),
(73, 'Water Absorb', 'Restores HP if hit by a Water-type move.'),
(74, 'Water Veil', 'Prevents the Pok&eacute;mon from getting a burn.'),
(75, 'White Smoke', 'Prevents other Pokémon from lowering its stats.'),
(76, 'Wonder Guard', 'Only supereffective moves will hit.'),
(77, 'Adaptability', 'Powers up moves of the same type as the Pokémon.'),
(78, 'Aerilate', 'Normal-type moves become Flying-type moves.'),
(79, 'Aftermath', 'Damages the attacker landing the finishing hit.'),
(80, 'Analytic', 'Boosts move power when the Pokémon moves after the target.'),
(81, 'Anger Point', 'Maxes the Attack stat after the Pokémon takes a critical hit.'),
(82, 'Anticipation', 'Senses an opposing Pokémon''s dangerous moves.'),
(83, 'Aroma Veil', 'Protects allies from attacks that effect their mental state.'),
(84, 'Aura Break', 'The effects of \\"Aura\\" Abilities are reversed.'),
(85, 'Bad Dreams', 'Reduces the HP of sleeping opposing Pokémon.'),
(86, 'Big Pecks', 'Protects the Pokémon from Defense-lowering attacks.'),
(87, 'Bulletproof', 'Protects the Pokémon from some ball and bomb moves.'),
(88, 'Cacophony', 'Avoids sound-based moves.'),
(89, 'Cheek Pouch', 'Restores HP as well when the Pokémon eats a Berry.'),
(90, 'Competitive', 'Boosts the Sp. Atk stat when a stat is lowered.'),
(91, 'Contrary', 'Makes stat changes have an opposite effect.'),
(92, 'Cursed Body', 'May disable a move used on the Pokémon.'),
(93, 'Dark Aura', 'Powers up each Pokémon''s Dark-type moves.'),
(94, 'Defeatist', 'Lowers stats when HP becomes half or less.'),
(95, 'Defiant', 'Boosts the Pokémon''s Attack stat when its stats are lowered.'),
(96, 'Download', 'Adjusts power based on an opposing Pokémon''s stats.'),
(97, 'Dry Skin', 'Reduces HP if it''s hot. Water restores HP.'),
(98, 'Awkward Aura', 'Powers up each Pokémon\\''s Awkward-type moves.'),
(99, 'Filter', 'Reduces damage from supereffective attacks.'),
(100, 'Flare Boost', 'Powers up special attacks when the Pokémon is burned.'),
(101, 'Flower Gift', 'Powers up party Pokémon when it''s sunny.'),
(102, 'Flower Veil', 'Prevents lowering of ally Grass-type Pokémon''s stats.'),
(103, 'Forewarn', 'Determines what moves an opposing Pokémon has.'),
(104, 'Friend Guard', 'Reduces damage done to allies.'),
(105, 'Frisk', 'The Pokémon can check an opposing Pokémon''s held item.'),
(106, 'Fur Coat', 'Halves damage from physical moves.'),
(107, 'Gale Wings', 'Gives priority to Flying-type moves.'),
(108, 'Gluttony', 'Makes the Pokémon use a held Berry earlier than usual.'),
(109, 'Gooey', 'Contact with the Pokémon lowers the attacker''s Speed stat.'),
(110, 'Grass Pelt', 'Boosts the Defense stat in Grassy Terrain.'),
(111, 'Harvest', 'May create another Berry after one is used.'),
(112, 'Healer', 'Sometimes heals an ally''s status condition.'),
(113, 'Heatproof', 'Weakens the power of Fire-type moves.'),
(114, 'Heavy Metal', 'Doubles the Pokémon''s weight.'),
(115, 'Honey Gather', 'The Pokémon may gather Honey from somewhere.'),
(116, 'Hydration', 'Heals status conditions if it''s raining.'),
(117, 'Ice Body', 'The Pokémon gradually regains HP in a hailstorm.'),
(118, 'Illusion', 'Comes out disguised as the Pokémon in the party''s last spot.'),
(119, 'Imposter', 'The Pokémon transforms itself into the Pokémon it''s facing.'),
(120, 'Infiltrator', 'Passes through the opposing Pokémon''s barrier and strikes.'),
(121, 'Iron Barbs', 'Inflicts damage to the attacker on contact.'),
(122, 'Iron Fist', 'Powers up punching moves.'),
(123, 'Justified', 'Boosts the Attack stat when it''s hit by a Dark-type move.'),
(124, 'Klutz', 'The Pokémon can''t use any held items.'),
(125, 'Leaf Guard', 'Prevents status conditions in sunny weather.'),
(126, 'Light Metal', 'Halves the Pokémon''s weight.'),
(127, 'Magic Bounce', 'Reflects status moves.'),
(128, 'Magic Guard', 'The Pokémon only takes damage from attacks.'),
(129, 'Magician', 'The Pokémon steals the held item of a Pokémon it hits with a move.'),
(130, 'Mega Launcher', 'Powers up aura and pulse moves.'),
(131, 'Mold Breaker', 'Moves can be used on the target regardless of its Abilities.'),
(132, 'Moody', 'Raises one stat and lowers another.'),
(133, 'Motor Drive', 'Boosts the Speed stat when it''s hit by an Electric-type move.'),
(134, 'Moxie', 'Boosts the Attack stat after knocking out any Pokémon.'),
(135, 'Multiscale', 'Reduces damage the Pokémon takes when its HP is full.'),
(136, 'Multitype', 'Changes the Pokémon''s type to match the Plate it holds.'),
(137, 'Mummy', 'Contact with the Pokémon spreads this Ability.'),
(138, 'No Guard', 'Ensures attacks by or against the Pokémon land.'),
(139, 'Normalize', 'All the Pokémon''s moves become Normal type.'),
(140, 'Overcoat', 'Protects the Pokémon from things like sand, hail and powder.'),
(141, 'Parental Bond', 'Parent and child attack together.'),
(142, 'Pickpocket', 'Steals an item from an attacker that made direct contact.'),
(143, 'Pixilate', 'Normal-type moves become Awkward-type moves.'),
(144, 'Poison Heal', 'Restores HP if the Pokémon is poisoned.'),
(145, 'Poison Touch', 'May poison a target when the Pokémon makes contact.'),
(146, 'Prankster', 'Gives priority to a status move.'),
(147, 'Protean', 'Changes the Pokémon''s type to the type of the move it''s using.'),
(148, 'Quick Feet', 'Boosts the Speed stat if the Pokémon has a status condition.'),
(149, 'Rattled', 'Some move types scare it and boost its Speed stat.'),
(150, 'Reckless', 'Powers up moves that have recoil damage.'),
(151, 'Refrigerate', 'Normal-type moves become Ice-type moves.'),
(152, 'Regenerator', 'Restores a little HP when withdrawn from battle.'),
(153, 'Rivalry', 'Deals more damage to Pokémon of the same gender.'),
(154, 'Sand Force', 'Boosts certain moves'' power in a sandstorm.'),
(155, 'Sand Rush', 'Boosts the Pokémon''s Speed stat in a sandstorm.'),
(156, 'Sap Sipper', 'Boosts the Attack stat when hit by a Grass-type move.'),
(157, 'Scrappy', 'Makes Normal- and Fighting-type moves hit Ghost-type Pokémon.'),
(158, 'Sheer Force', 'Removes additional effects to increase move damage.'),
(159, 'Simple', 'The Pokémon is prone to wild stat changes.'),
(160, 'Skill Link', 'Increases the number of times multi-strike moves hit.'),
(161, 'Slow Start', 'Temporarily halves the Pokémon''s Attack and Speed stats.'),
(162, 'Sniper', 'Powers up moves if they become critical hits.'),
(163, 'Snow Cloak', 'Boosts evasion in a hailstorm.'),
(164, 'Snow Warning', 'The Pokémon summons a hailstorm when it enters a battle.'),
(165, 'Solar Power', 'Boosts the Sp. Atk stat in sunny weather, but HP decreases.'),
(166, 'Solid Rock', 'Reduces damage from supereffective attacks.'),
(167, 'Stall', 'The Pokémon moves after all other Pokémon do.'),
(168, 'Stance Change', 'The Pokémon changes form depending on how it battles.'),
(169, 'Steadfast', 'Boosts the Speed stat each time the Pokémon flinches.'),
(170, 'Storm Drain', 'Draws in all Water-type moves to boost its Sp. Atk stat.'),
(171, 'Strong Jaw', 'The Pokémon''s strong jaw gives it tremendous biting power.'),
(172, 'Super Luck', 'Boosts the critical-hit ratios of moves.'),
(173, 'Sweet Veil', 'Prevents itself and ally Pokémon from falling asleep.'),
(174, 'Symbiosis', 'The Pokémon can pass an item to an ally.'),
(175, 'Tangled Feet', 'Raises evasion if the Pokémon is confused.'),
(176, 'Technician', 'Powers up the Pokémon''s weaker moves.'),
(177, 'Telepathy', 'Anticipates an ally''s attack and dodges it.'),
(178, 'Teravolt', 'Moves can be used on the target regardless of its Abilities.'),
(179, 'Tinted Lens', 'Powers up \\"not very effective\\" moves.'),
(180, 'Tough Claws', 'Powers up moves that make direct contact'),
(181, 'Toxic Boost', 'Powers up physical attacks when the Pokémon is poisoned.'),
(182, 'Turboblaze', 'Moves can be used on the target regardless of its Abilities.'),
(183, 'Unaware', 'Ignores the opposing Pokémon''s stat changes.'),
(184, 'Unburden', 'Boosts the Speed stat if its held item is used or lost.'),
(185, 'Unnerve', 'Unnerves opposing Pokémon and makes them unable to eat Berries.'),
(186, 'Victory Star', 'Boosts the accuracy of its allies and itself.'),
(187, 'Weak Armor', 'Physical attacks lower its Defense stat and raise its Speed stat.'),
(188, 'Wonder Skin', 'Makes status moves more likely to miss.'),
(189, 'Zen Mode', 'Changes the Pokémon''s shape when HP is half or less.'),
(190, '-------', 'No special ability.'),
(191, 'Lightningrod', 'Draws in all Electric-type moves to up Sp. Attack.');

-- --------------------------------------------------------

--
-- Table structure for table `badge`
--

CREATE TABLE IF NOT EXISTS `badge` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `leader` varchar(32) NOT NULL,
  `type` varchar(31) DEFAULT NULL,
  `time` varchar(64) DEFAULT NULL,
  `attempts` int(3) DEFAULT NULL,
  `order_id` int(3) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `badge_pokemon`
--

CREATE TABLE IF NOT EXISTS `badge_pokemon` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `pokemon` varchar(64) NOT NULL,
  `level` int(3) NOT NULL,
  `badge_id` int(13) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `badge_id` (`badge_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `box`
--

CREATE TABLE IF NOT EXISTS `box` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `scenery` varchar(32) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `box`
--

INSERT INTO `box` (`id`, `name`, `scenery`, `active`) VALUES
(1, NULL, 'Forest', 1),
(2, NULL, 'City', 0),
(3, NULL, 'Seafloor', 0),
(4, NULL, 'Forest', 0),
(5, NULL, 'Forest', 0),
(6, NULL, 'Cave', 0),
(7, NULL, 'Desert', 0),
(8, NULL, 'Forest', 0),
(9, NULL, 'Seafloor', 0),
(10, NULL, 'Seafloor', 0),
(11, NULL, 'Forest', 0),
(12, NULL, 'Forest', 0),
(13, NULL, 'Volcano', 0),
(14, NULL, 'Savana', 0);

-- --------------------------------------------------------

--
-- Table structure for table `credits`
--

CREATE TABLE IF NOT EXISTS `credits` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_general_mysql500_ci NOT NULL,
  `title` varchar(64) CHARACTER SET latin1 NOT NULL,
  `pokemon` varchar(64) CHARACTER SET latin1 NOT NULL,
  `quote` varchar(1024) COLLATE utf8_general_mysql500_ci NOT NULL,
  `gen_flags` bigint(20) NOT NULL,
  `link` varchar(512) CHARACTER SET latin1 DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `order_id` int(4) NOT NULL DEFAULT '99',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `elite_four`
--

CREATE TABLE IF NOT EXISTS `elite_four` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `name` varchar(24) NOT NULL,
  `type` varchar(16) NOT NULL,
  `attempts` int(3) DEFAULT NULL,
  `wins` int(13) NOT NULL DEFAULT '0',
  `losses` int(13) NOT NULL DEFAULT '0',
  `time` int(64) DEFAULT NULL,
  `is_rematch` tinyint(1) NOT NULL DEFAULT '0',
  `order` int(2) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `elite_four_pokemon`
--

CREATE TABLE IF NOT EXISTS `elite_four_pokemon` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `pokemon` varchar(64) NOT NULL,
  `level` int(2) NOT NULL,
  `item` varchar(64) DEFAULT NULL,
  `elite_four_id` int(13) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `elite_four_id` (`elite_four_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `elite_four_pokemon_move`
--

CREATE TABLE IF NOT EXISTS `elite_four_pokemon_move` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `elite_four_pokemon_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pokemon` (`elite_four_pokemon_id`),
  KEY `pokemon_2` (`elite_four_pokemon_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fact`
--

CREATE TABLE IF NOT EXISTS `fact` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_general_mysql500_ci NOT NULL,
  `value` varchar(64) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `amount` int(5) DEFAULT NULL,
  `order_id` int(3) NOT NULL DEFAULT '99',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `fact`
--

INSERT INTO `fact` (`id`, `name`, `value`, `amount`, `order_id`) VALUES
(1, 'Trainer Name', 'ABC', 0, 10),
(2, 'Trainer Nickname', 'Alphabet', 0, 20),
(3, 'Trainer ID', '12345', 0, 30),
(4, 'Gender', 'Male', 0, 40),
(5, 'Starter', 'Charmander', 0, 50);

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

CREATE TABLE IF NOT EXISTS `field` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `label` varchar(64) NOT NULL,
  `field_type_id` int(13) NOT NULL,
  `order_id` int(5) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `field_type_id` (`field_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `field`
--

INSERT INTO `field` (`id`, `name`, `label`, `field_type_id`, `order_id`) VALUES
(1, 'next_move', 'Next move', 1, 6),
(2, 'next_move_level', 'Next move level', 1, 7),
(3, 'evolves_method', 'Evolution method', 1, 8),
(4, 'evolves_level', 'Evolution level', 1, 9),
(5, 'ability', 'Ability', 1, 3),
(6, 'nature', 'Nature', 1, 4),
(7, 'characteristic', 'Characteristic', 1, 5),
(8, 'has_pokerus', 'Pokérus', 2, 12),
(9, 'is_shiny', 'Shiny', 2, 13),
(10, 'comment', 'Comment', 1, 99),
(11, 'type1', 'Type 1', 1, 1),
(12, 'type2', 'Type 2', 1, 2),
(13, 'evohatch', 'Evolved/hatched into', 1, 10),
(14, 'season', 'Season', 2, 14),
(15, 'time_obtained', 'Time obtained', 1, 0),
(16, 'evohatch_linked', 'ID of evolve/hatch into/from', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `field_option`
--

CREATE TABLE IF NOT EXISTS `field_option` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `value` varchar(64) NOT NULL,
  `label` varchar(64) NOT NULL,
  `field_id` int(13) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `field_id` (`field_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `field_option`
--

INSERT INTO `field_option` (`id`, `value`, `label`, `field_id`) VALUES
(1, '1', 'Has Pokérus', 8),
(2, '2', 'Had Pokérus', 8),
(3, '1', 'Is shiny', 9),
(4, 'summer', 'Summer', 14),
(5, 'autumn', 'Autumn', 14),
(6, 'winter', 'Winter', 14),
(7, 'spring', 'Spring', 14);

-- --------------------------------------------------------

--
-- Table structure for table `field_type`
--

CREATE TABLE IF NOT EXISTS `field_type` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `field_type`
--

INSERT INTO `field_type` (`id`, `name`) VALUES
(1, 'text'),
(2, 'radio'),
(3, 'textarea');

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE IF NOT EXISTS `general` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `value` varchar(2048) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`id`, `name`, `value`, `updated_at`) VALUES
(1, 'pokedex_seen', '0', '2010-01-01 00:00:00'),
(2, 'pokedex_owned', '0', '2010-01-01 00:00:00'),
(3, 'current_goal', '', '2010-01-01 00:00:00'),
(4, 'current_pokecenter', '', '2010-01-01 00:00:00'),
(5, 'money', '0', '2010-01-01 00:00:00'),
(6, 'last_update', '', '2010-01-01 00:00:00'),
(7, 'current_location', '', '2010-01-01 00:00:00'),
(8, 'optional_goal', '', '2010-01-01 00:00:00'),
(9, 'hms', 'Cut (HM01);Fly (HM02);Surf (HM03);Strength (HM04);Flash (HM05);Whirlpool (HM06);Waterfall (HM07);Cut;Fly;Surf;Strength;Flash;Whirlpool;Waterfall', '2010-01-01 00:00:00'),
(10, 'notice', '', '2010-01-01 00:00:00'),
(11, 'live_updater_link', 'https://www.reddit.com/live/', '2010-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `important_trainer`
--

CREATE TABLE IF NOT EXISTS `important_trainer` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `name` varchar(24) NOT NULL,
  `nickname` varchar(63) DEFAULT NULL,
  `type` varchar(16) NOT NULL,
  `attempts` int(3) DEFAULT NULL,
  `wins` int(13) NOT NULL DEFAULT '0',
  `losses` int(13) NOT NULL DEFAULT '0',
  `time` int(64) DEFAULT NULL,
  `is_rematch` tinyint(1) NOT NULL DEFAULT '0',
  `order_by` int(2) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `important_trainer_pokemon`
--

CREATE TABLE IF NOT EXISTS `important_trainer_pokemon` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `pokemon` varchar(64) NOT NULL,
  `nickname` varchar(63) DEFAULT NULL,
  `level` int(2) NOT NULL,
  `item` varchar(64) DEFAULT NULL,
  `important_trainer_id` int(13) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `elite_four_id` (`important_trainer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `important_trainer_pokemon_move`
--

CREATE TABLE IF NOT EXISTS `important_trainer_pokemon_move` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `important_trainer_pokemon_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pokemon` (`important_trainer_pokemon_id`),
  KEY `pokemon_2` (`important_trainer_pokemon_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `amount` int(3) DEFAULT NULL,
  `image` varchar(16) DEFAULT NULL,
  `item_type_id` int(13) NOT NULL,
  `pc` tinyint(1) NOT NULL,
  `comment` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_type_id` (`item_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `item_type`
--

CREATE TABLE IF NOT EXISTS `item_type` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) COLLATE utf8_general_mysql500_ci NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `item_type`
--

INSERT INTO `item_type` (`id`, `name`, `visible`) VALUES
(1, 'Items', 1),
(2, 'Medicine', 1),
(3, 'Poké Balls', 1),
(4, 'TMs & HMs', 1),
(5, 'Berries', 1),
(6, 'Key Items', 1),
(7, 'Free Space', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `message` varchar(1024) COLLATE utf8_general_mysql500_ci NOT NULL,
  `ip` varchar(64) COLLATE utf8_general_mysql500_ci NOT NULL,
  `sent_user` varchar(64) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `read` int(1) NOT NULL DEFAULT '0',
  `suggestion_id` int(13) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `suggestion_id` (`suggestion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `milestone`
--

CREATE TABLE IF NOT EXISTS `milestone` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `time` varchar(64) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `move`
--

CREATE TABLE IF NOT EXISTS `move` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `pokemon` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pokemon` (`pokemon`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pokemon`
--

CREATE TABLE IF NOT EXISTS `pokemon` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pokemon` varchar(64) COLLATE utf8_general_mysql500_ci NOT NULL,
  `name` varchar(128) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `level` int(11) NOT NULL,
  `nickname` varchar(64) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `gender` varchar(4) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `hold_item` varchar(64) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `box_id` int(2) DEFAULT NULL,
  `poke_ball` varchar(32) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `party_order` int(3) NOT NULL DEFAULT '999',
  `comment` varchar(128) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `box` (`box_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pokemon_field_eav`
--

CREATE TABLE IF NOT EXISTS `pokemon_field_eav` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `pokemon_id` int(13) NOT NULL,
  `field_id` int(13) NOT NULL,
  `value` varchar(64) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pokemon_id` (`pokemon_id`,`field_id`),
  KEY `field_id` (`field_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `runs`
--

CREATE TABLE IF NOT EXISTS `runs` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `gen` varchar(10) NOT NULL,
  `name` varchar(64) NOT NULL,
  `short` varchar(32) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `runs`
--

INSERT INTO `runs` (`id`, `gen`, `name`, `short`, `created_at`) VALUES
(1, 'I', 'Pok&eacute;mon Red', 'R', '2010-01-01 00:00:00'),
(2, 'II', 'Pok&eacute;mon Crystal', 'C', '2010-01-01 00:00:00'),
(3, 'III', 'Pok&eacute;mon Emerald', 'E', '2010-01-01 00:00:00'),
(4, 'III', 'Pok&eacute;mon FireRed', 'FR', '2010-01-01 00:00:00'),
(5, 'IV', 'Pok&eacute;mon Platinum', 'PL', '2010-01-01 00:00:00'),
(6, 'IV', 'Pok&eacute;mon HeartGold', 'HG', '2010-01-01 00:00:00'),
(7, 'V', 'Pok&eacute;mon Black', 'B', '2010-01-01 00:00:00'),
(8, 'V', 'Pok&eacute;mon Black 2', 'B2', '2010-01-01 00:00:00'),
(9, 'VI', 'Pok&eacute;mon X', 'X', '2010-01-01 00:00:00'),
(10, 'VI', 'Pok&eacute;mon Omega Ruby', 'OR', '2010-01-01 00:00:00'),
(11, 'I', 'Pok&eacute;mon Red [Anniversary!]', 'R_A', '2010-01-01 00:00:00'),
(12, 'VI', 'Pok&eacute;mon Alpha Sapphire (Randomized)', 'AS_R', '2010-01-01 00:00:00'),
(13, 'III', 'Pok&eacute;mon Colosseum', 'COL', '2010-01-01 00:00:00'),
(14, 'III', 'Pok&eacute;mon XD: Gale of Darkness', 'XD', '2010-01-01 00:00:00'),
(15, 'II', 'Pok&eacute;mon Crystal [Anniversary!]', 'C_A', '2010-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `status` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'In party'),
(2, 'In box'),
(3, 'Released'),
(4, 'Traded'),
(5, 'Evolved'),
(6, 'Daycare'),
(7, 'Hatched'),
(8, 'Lost');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE IF NOT EXISTS `suggestion` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `suggestion` varchar(1024) COLLATE utf8_general_mysql500_ci NOT NULL,
  `ip` varchar(64) COLLATE utf8_general_mysql500_ci NOT NULL,
  `resolved_by` varchar(32) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Constraints for dumped tables
--

--
-- Constraints for table `badge_pokemon`
--
ALTER TABLE `badge_pokemon`
  ADD CONSTRAINT `badge_pokemon_ibfk_1` FOREIGN KEY (`badge_id`) REFERENCES `badge` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `elite_four_pokemon`
--
ALTER TABLE `elite_four_pokemon`
  ADD CONSTRAINT `elite_four_pokemon_ibfk_1` FOREIGN KEY (`elite_four_id`) REFERENCES `elite_four` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `elite_four_pokemon_move`
--
ALTER TABLE `elite_four_pokemon_move`
  ADD CONSTRAINT `elite_four_pokemon_move_ibfk_1` FOREIGN KEY (`elite_four_pokemon_id`) REFERENCES `elite_four_pokemon` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `field`
--
ALTER TABLE `field`
  ADD CONSTRAINT `field_ibfk_1` FOREIGN KEY (`field_type_id`) REFERENCES `field_type` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `field_option`
--
ALTER TABLE `field_option`
  ADD CONSTRAINT `field_option_ibfk_1` FOREIGN KEY (`field_id`) REFERENCES `field` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `important_trainer_pokemon`
--
ALTER TABLE `important_trainer_pokemon`
  ADD CONSTRAINT `important_trainer_pokemon_ibfk_1` FOREIGN KEY (`important_trainer_id`) REFERENCES `important_trainer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `important_trainer_pokemon_move`
--
ALTER TABLE `important_trainer_pokemon_move`
  ADD CONSTRAINT `important_trainer_pokemon_move_ibfk_1` FOREIGN KEY (`important_trainer_pokemon_id`) REFERENCES `important_trainer_pokemon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `move`
--
ALTER TABLE `move`
  ADD CONSTRAINT `move_ibfk_1` FOREIGN KEY (`pokemon`) REFERENCES `pokemon` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pokemon`
--
ALTER TABLE `pokemon`
  ADD CONSTRAINT `pokemon_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`id`);

--
-- Constraints for table `pokemon_field_eav`
--
ALTER TABLE `pokemon_field_eav`
  ADD CONSTRAINT `pokemon_field_eav_ibfk_1` FOREIGN KEY (`pokemon_id`) REFERENCES `pokemon` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `pokemon_field_eav_ibfk_2` FOREIGN KEY (`field_id`) REFERENCES `field` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
