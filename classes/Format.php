<?php 

	class Format {

		public function textShorten($text, $limit = 400){

        if(strlen($text) >= $limit){
            $text = $text. "";
            $text = substr($text, 0, $limit);
            $text = $text."...";
            return $text;
        }
        return $text;
    }

		public function validation($data){

			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);

			return $data;
		}
	}
?>