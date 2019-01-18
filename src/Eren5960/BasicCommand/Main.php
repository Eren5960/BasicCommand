<?php
/**
 *  _____                    ____   ___    __     ___
 * | ____| _ __  ___  _ __  | ___| / _ \  / /_   / _ \
 * |  _|  | '__|/ _ \| '_ \ |___ \| (_) || '_ \ | | | |
 * | |___ | |  |  __/| | | | ___) |\__, || (_) || |_| |
 * |_____||_|   \___||_| |_||____/   /_/  \___/  \___/
 *
 * @author Eren5960
 * @link https://github.com/Eren5960
 */
declare(strict_types=1);

namespace Eren5960\BasicCommand;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener{

	public function onEnable() : void{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onChat(PlayerChatEvent $event) : void{
		$player = $event->getPlayer();
		$message = $event->getMessage();

		if(substr($message, 0, 2) === "./"){
			$event->setCancelled();
			$this->getServer()->dispatchCommand($player, substr($message, 2));
		}
	}
}