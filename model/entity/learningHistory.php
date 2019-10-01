<?php 
    class LearningHistory{
        var $id;
        var $yearFrom;
        var $yearTo;
        var $schoolName;
        var $schoolAddress;
        var $idStudent;
        function __construct($_id, $_yearFrom, $_yearTo, $_schoolName, $_schoolAddress, $_idStudent){
            $this->id = $_id;
            $this->yearFrom = $_yearFrom;
            $this->yearTo = $_yearTo;
            $this->schoolName = $_schoolName;
            $this->schoolAddress = $_schoolAddress;
            $this->idStudent = $_idStudent;
        }
        static function getList($idStudent){
            $rs = array();
            for ($i=0; $i < 5; $i++) { 
                array_push($rs,new LearningHistory(
                    $i,
                    2001 +$i,
                    2002 +$i,
                    'Nguyễn Huệ '.$i ,
                    'Huế',
                    $idStudent + $i
                ));
            }
            return $rs;
        }
        static function getListFromFile($idStudent){
            $lines = file("../resource/learninghistory.txt", FILE_IGNORE_NEW_LINES);
            
            $rs = array();
            foreach ($lines as $key => $value) {
                $arr = explode ("#",$value);
                if ( $arr[5] == $idStudent){
                    array_push($rs,new LearningHistory(
                        $arr[0],
                        $arr[1],
                        $arr[2],
                        $arr[3],
                        $arr[4],
                        $arr[5]
                    ));
                }               
            }
            return $rs;
        }
        static function addStudentHistory($yearFrom, $yearTo, $schoolName, $schoolAddress){
            $lines = file("../resource/learninghistory.txt", FILE_IGNORE_NEW_LINES);
            $strId= (string)(explode("#",$lines[count($lines)-1])[0]+1)  ;
            
            $fp = fopen("../resource/learninghistory.txt","a+") ;
            
            fwrite($fp,"\n".implode("#",array($strId,$yearFrom,$yearTo,$schoolName,$schoolAddress,"101")));
            $schoolName = $yearFrom = $yearTo = $schoolAddress = "";
            fclose($fp);
        }
    }
?>