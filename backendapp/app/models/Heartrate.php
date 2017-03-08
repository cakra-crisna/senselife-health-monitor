<?php

class Heartrate extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'user' => 'required',
		'timestamp' => 'required',
		'value' => 'required'
	);

	public function changeValues($data)
	{
		$finaldata = array();
		foreach ($data as $key) {
			$dta = [$key->timestamp,$key->value];
			array_push($finaldata,$dta);	
		}
		return $finaldata;
	}
	public function getAllData($id,$startdate,$enddate)
	{	
		$stepdata = Step::where('created_by','=',$id)->where('created_at','>=',$startdate)->where('created_at','<=',$enddate)->select('value','timestamp')->get();
		$caloriedata = Calorie::where('created_by','=',$id)->where('created_at','>=',$startdate)->where('created_at','<=',$enddate)->select('value','timestamp')->get();
		$heartdata = Heartrate::where('created_by','=',$id)->where('created_at','>=',$startdate)->where('created_at','<=',$enddate)->select('value','timestamp')->get();
		$tempdata = Temperature::where('created_by','=',$id)->where('created_at','>=',$startdate)->where('created_at','<=',$enddate)->select('temperature as value','timestamp')->get();

		
		$data = array(
			'stepdata' => $this->changeValues($stepdata),
			'caloriedata'=>$this->changeValues($caloriedata),
			'heartdata'=>$this->changeValues($heartdata),
			'tempdata'=>$this->changeValues($tempdata)
		);
		return $data;
	}
	public function getHistoricalData($id,$startdate,$enddate)
	{
		return $this->getAllData($id,$startdate,$enddate);
	}

	public function getHistoricalDataAll($id,$startdate,$enddate)
	{
		$stepdata = Step::where('created_by','=',$id)->where('created_at','>=',$startdate)->where('created_at','<=',$enddate)->select('value','timestamp')->limit(500)->get();

	}
}
