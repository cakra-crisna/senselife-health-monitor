<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	protected function sendResponse($data,$errors,$messages,$code,$redirect)
	{
			$haserror = true;
			if(!$errors){
				$haserror = false;
			}
			return Response::json(array(
				'error' => $haserror,
				'errors' => $errors,
				'message' => $messages,
				'redirect' => $redirect,
				'data' => $data
				),$code);
	}
	
	protected function sendSuccessResponse($data,$message,$redirect)
	{
			return $this->sendResponse($data,null,$message,200,$redirect);
	}
	
	
	protected function sendErrorResponse($data,$errors,$message,$redirect)
	{
			return $this->sendResponse($data,$errors,$message,200,$redirect);
	}

}
