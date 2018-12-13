<?php
/*
 * Controler 
 */

class mainController
{

	public static function helloWorld($request,$context)
	{
		$context->mavariable="ok";
		return context::SUCCESS;
	}

	public static function superTest($request,$context)
	{
		$context->param1=$_GET["param1"];
		$context->param2=$_GET["param2"];
		return context::SUCCESS;
	}	

	public static function login($request, $context)
	{
		
		if(!empty($request['login']) && !empty($request['pass'])) {
			$req = utilisateurTable::getUserByLoginAndPass($request['login'], $request['pass']);
			
			if(!empty($req)) {
				$context->setSessionAttribute('is_logged', 1);
				$context->setSessionAttribute('id', $req[0]['id']);
				return context::SUCCESS;
			}
			return context::ERROR;
		}
		return context::ACCESS;
	}
	
	public static function logout($request, $context)
	{
		
		$context->setSessionAttribute('is_logged', -1);
		context::redirect("././monApplication.php?action=login");
	}
		
	public static function user($request, $context)
	{
		if(!empty($request['id'])) {
			$user = utilisateurTable::getUserById($request['id']);
			if(empty($user)) {
				return context::ERROR;
			}
			$mess = messageTable::getMessagePostedBy($request['id']);

			$data['login'] = $user[0];
						
			$data['message'] = $mess;

			$context->data = $data;
			if($context->getSessionAttribute('is_logged') == 1 && $request['id'] == $context->getSessionAttribute('id')) {
				return context::SUCCESS;
			} else {
				return context::ACCESS;
			}
		} else if($context->getSessionAttribute('is_logged') == 1) {
			$user = utilisateurTable::getUserById($context->getSessionAttribute('id'));
			$mess = messageTable::getMessagePostedBy($context->getSessionAttribute('id'));

			$data['login'] = $user[0];
			$data['message'] = $mess;

			$context->data = $data;
			return context::SUCCESS;
		}
		return context::ERROR;
	}	


		
	public static function messageme($request, $context)
	{
		if(!empty($request['messageform'])) {
			$image = (empty($request['image']) ? "null" : $request['image']);
			$postInfo['texte'] = $request['text'];
			$postInfo['image'] = $image;
			$postInfo['date'] = date("Y-m-d H:i:s");
			$post = new post($postInfo);
			$idPost = $post->save();
			$messageInfo['emetteur'] = $context->getSessionAttribute('id');
			$messageInfo['parent'] = $context->getSessionAttribute('id');
			$messageInfo['post'] = $idpost;
			$message = new message($messageInfo);
			$idmessage = $message->save();
			return context::SUCCESS;
		}
		return context::ERROR;
	}


	
	
	public static function share($request, $context)
	{
		if(!empty($request['idPost'])) {
			$messageInfo['parent'] = $request['parent'];
			$messageInfo['post'] = $request['post'];
			$messageInfo['emetteur'] = $context->getSessionAttribute('id');
			$message = new message($messageInfo);
			$id = $message->save();
			return context::SUCCESS;
		}
		return context::ERROR;
	}

	

	public static function index($request,$context)
	{
		
		return context::SUCCESS;
	}

	public static function inscription($request, $context)
	{
		//print_r($request);
		if(!empty($request['identifiant']) && !empty($request['motdepasse']) && !empty($request['nom']) && !empty($request['prenom'])) {
			$userInfo['identifiant'] = $request['identifiant'];
			$userInfo['pass'] = sha1($request['motdepasse']);
			$userInfo['nom'] = $request['nom'];
			$userInfo['prenom'] = $request['prenom'];
			if(isset($request['statut'])) {
				$userInfo['statut'] = $request['statut'];
			}
			if(isset($request['avatar'])) {
				$userInfo['avatar'] = $request['avatar'];
			}
			$user = new utilisateur($userInfo);
			$id = $user->save();
			if(empty($id)) {
				return context::ERROR;
			}
			$context->setSessionAttribute('is_logged', 1);
			$context->setSessionAttribute('id', $id);
			return context::SUCCESS;
		}
		return context::ACCESS;
	}


	public static function edituser($request, $context)
	{
		print_r($request);
		if(empty($request['edituserform'])) {
			$userInfo['id'] = $context->getSessionAttribute('id');
			$userInfo['pass'] = sha1($request['motdepasse']);
			$userInfo['nom'] = $request['nom'];
			$userInfo['prenom'] = $request['prenom'];
			if(isset($request['statut'])) {
				$userInfo['statut'] = $request['statut'];
			}
			if(isset($request['avatar'])) {
				$userInfo['avatar'] = $request['avatar'];
			}
			$user = new utilisateur($userInfo);
			$id = $user->save();
			return context::SUCCESS;
		}
		return context::ACCESS;
	}
}
