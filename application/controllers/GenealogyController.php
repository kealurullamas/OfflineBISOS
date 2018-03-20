<?php
    class GenealogyController extends CI_Controller
    {
        public function index()
        {
            // $data=[
            //     'citizens'=>$this->citizen_model->get_citizens(),
            // ];
            $relations=[];    
            $citizen=$this->citizen_model->get_citizens();
            $firstperson='Bonifacio Sanchez';
            foreach($citizen as $people){
                if($firstperson!=$people['name_slug']){
                    // $secondperson='Mutya Rullamas';
                    $tree1=$this->supply($citizen,$firstperson);
                    $tree2=$this->supply($citizen,$people['name_slug']);
                
                    $listlevelperson=$this->checkRelationship($this->supply($citizen,$firstperson),$this->supply($citizen,$people['name_slug']));
                    $relationarray=$this->GetRelationship($tree2[0][0]['gender'], $listlevelperson[0], $listlevelperson[2], $listlevelperson[3]['name_slug'],$tree1);
            
                    if(!empty($relationarray))
                    {
                        array_push($relations,array($people,$relationarray));
                    }
                }


            }
            // $firstperson='Kealu Rullamas';
            // $secondperson='Mutya Rullamas';
            // $tree1=$this->supply($citizen,$firstperson);
            // $tree2=$this->supply($citizen,$secondperson);
    
            // $listlevelperson=$this->checkRelationship($this->supply($citizen,$firstperson),$this->supply($citizen,$secondperson));
            // $relationarray=$this->GetRelationship($tree2[0][0]['gender'], $listlevelperson[0], $listlevelperson[2], $listlevelperson[3]['name_slug'],$tree1);

            // print_r($relations);
            foreach($relations as $relation)
            {
                echo $relation[0]['name_slug'].' '.$relation[1];
            }
            $data=['relations'=>$relations];
            $this->load->view('templates/header');
            $this->load->view('test_gen/genealogy',$data);
            $this->load->view('templates/footer');

        }

        public function supply($listperson,$name)
        {
            
            $familytree=array();
            try
            {
                $count = 1;                      //para sa max size of inner arrays
                $indexInPreviousLevel = 0;       //nag ttraverse sa previous level para pang supply ng father and mother
                foreach($listperson as $person)
                {
                    if($person['name_slug']==$name)
                    {
                        array_push($familytree, array($person));
                    }
                }
                for ($x = 1; $x < 5; $x++)             
                {
                    $indexInPreviousLevel = 0;
                    $count *= 2;
                    $father="";
                    $mother="";
                    $family=array();
                    for ($y = 0; $y < $count; $y++)
                    {
                        foreach($listperson as $person)
                        {
                            if(!empty($familytree[$x-1][$indexInPreviousLevel])){
                                if($person['name_slug']==$familytree[$x-1][$indexInPreviousLevel]['father'])
                                {
                                    $father=$person;
                                    array_push($family,$father);

                                }
                                else if($person['name_slug']==$familytree[$x-1][$indexInPreviousLevel]['mother'])
                                {
                                    $mother=$person;
                                    array_push($family,$mother);
                                }
                            }
                        }
                        $y++;
                        $indexInPreviousLevel++;
                    }
                    array_push($familytree,$family);
                    
                }
                return $familytree;
            }
            catch (Exception $e)
            {
                Console.WriteLine($e);
                return $familytree;
            }
        }
    
    
        public function checkRelationship($familytree1,$familytree2)
        {
            try
            {
                $tree1Count = 1;
                $tree2Count = 1;
                for ($i = 0; $i < count($familytree1); $i++)                          // outer loop para sa jagged array ng first tree, tree[ETO][]
                {
                    if($i > 0)
                    {
                        $tree1Count *= 2;
                    }
                    for ($j = 0; $j < $tree1Count; $j++)                        // inner loop para sa traversal sa items ng jagged array ng first tree, tree[][ETO]
                    {
                        for ($k = 0; $k < count($familytree2); $k++)                  // outer loop para sa jagged array ng second tree, tree[ETO][]
                        {
                            if($k > 0)
                            {
                                $tree2Count *= 2;
                            }
                            for ($l = 0; $l < $tree2Count; $l++)                // inner loop para sa traversal sa items ng jagged array ng second tree, tree[][ETO]
                            {

                                if(empty($familytree2[$k][$l]))
                                {
                                    break;
                                }
                                // if ($familytree1[$i][$j]['father']==$familytree2[$k][$l]['father'] && $familytree1[$i][$j]['mother']==$familytree2[$k][$l]['mother'])
                                if ((!empty($familytree1[$i][$j]['father'])&&!empty($familytree2[$k][$l]['father'])&&!empty($familytree1[$i][$j]['mother'])&&!empty($familytree2[$k][$l]['mother'])&&
                                        ($familytree1[$i][$j]['father']==$familytree2[$k][$l]['father'] && $familytree1[$i][$j]['mother']==$familytree2[$k][$l]['mother'])))
                                {
                                    $level=[];
                                    $level[0] = $i; $level[1] = $k;     // level i for tree 1, level k for tree 2
                                    $relation=[$i,$familytree1[$i][$j],$k,$familytree2[$k][$l]];
                                    return $relation;
                                }
                            }
                        }
                        $tree2Count = 1;
                    }
                }
            }
            catch (Exception $e)
            {
                Console.WriteLine($e);
                return null;
            }
            return null;
        }
    
        public function  GetRelationship($genderSecondPerson, $firstPersonLevel, $secondPersonLevel, $person2,$directtree)
        {
            
            $OLDTOYOUNGINDIRECTFAMILYRELATIONMALE = [
            array("Brother","Nephew","Grand-Nephew","Great-Grand-Nephew","2nd Great-Grand-Nephew", "3rd Great-Grand-Nephew", "4th Great-Grand-Nephew", "5th Great-Grand-Nephew" ),
            array("Nephew", "First Cousin","First Cousin Once Removed","First Twice Removed","First Cousin 3x Removed","First Cousin 4x Removed", "First Cousin 5x Removed", "First Cousin 6x Removed" ),
            array( "Grand-Newphew", "First Cousin Once Removed","Second Cousin","Second Cousin Once Removed","Second Cousin Twice Removed","Second Cousin 3x Removed", "Second Cousin 4x Removed", "Second Cousin 5x Removed" ),
            array( "Great-Grand-Nephew", "First Cousin Twice Removed","Second Cousin Once Removed","Third Cousin","Third Cousin Once Removed","Third Cousin Twice Removed", "Third Cousin 3x Removed", "Third Cousin 4x Removed" ),
            array( "2nd Great-Grand-Nephew", "First Cousin 3x Removed","Second Cousin Twice Removed","Third Cousin Once Removed","Fourth Cousin","Fourth Cousin Once Removed", "Fourth Cousin Twice Removed", "Fourth Cousin 3x Removed" ),
            array( "3rd Great-Grand-Nephew", "First Cousin 4x Removed","Second Cousin 3x Removed","Third Cousin Twice Removed","Fourth Cousin Once Removed","Fifth Cousin", "Fifth Cousin Once Removed", "Fifth Cousin Twice Removed" ),
            array( "4th Great-Grand-Nephew", "First Cousin 5x Removed","Second Cousin 4x Removed","Third Cousin 3x Removed","Fourth Cousin Twice Removed","Fifth Cousin Once Removed", "Sixth Cousin", "Sixth Cousin Once Removed" ),
            array( "5th Great-Grand-Nephew", "First Cousin 6x Removed","Second Cousin 5x Removed","Third Cousin 4x Removed","Fourth Cousin 3x Removed","Fifth Cousin Twice Removed", "Sixt Cousin Once Removed", "Seventh Cousin" )
            ];
            

            $OLDTOYOUNGINDIRECTFAMILYRELATIONFEMALE = [
            array("Sister","Niece","Grand-Niece","Great-Grand-Niece","2nd Great-Grand-Niece", "3rd Great-Grand-Niece", "4th Great-Grand-Niece", "5th Great-Grand-Niece" ),
            array("Nephew", "First Cousin","First Cousin Once Removed","First Twice Removed","First Cousin 3x Removed","First Cousin 4x Removed", "First Cousin 5x Removed", "First Cousin 6x Removed" ),
            array( "Grand-Newphew", "First Cousin Once Removed","Second Cousin","Second Cousin Once Removed","Second Cousin Twice Removed","Second Cousin 3x Removed", "Second Cousin 4x Removed", "Second Cousin 5x Removed" ),
            array( "Great-Grand-Nephew", "First Cousin Twice Removed","Second Cousin Once Removed","Third Cousin","Third Cousin Once Removed","Third Cousin Twice Removed", "Third Cousin 3x Removed", "Third Cousin 4x Removed" ),
            array( "2nd Great-Grand-Nephew", "First Cousin 3x Removed","Second Cousin Twice Removed","Third Cousin Once Removed","Fourth Cousin","Fourth Cousin Once Removed", "Fourth Cousin Twice Removed", "Fourth Cousin 3x Removed" ),
            array( "3rd Great-Grand-Nephew", "First Cousin 4x Removed","Second Cousin 3x Removed","Third Cousin Twice Removed","Fourth Cousin Once Removed","Fifth Cousin", "Fifth Cousin Once Removed", "Fifth Cousin Twice Removed" ),
            array( "4th Great-Grand-Nephew", "First Cousin 5x Removed","Second Cousin 4x Removed","Third Cousin 3x Removed","Fourth Cousin Twice Removed","Fifth Cousin Once Removed", "Sixth Cousin", "Sixth Cousin Once Removed" ),
            array( "5th Great-Grand-Nephew", "First Cousin 6x Removed","Second Cousin 5x Removed","Third Cousin 4x Removed","Fourth Cousin 3x Removed","Fifth Cousin Twice Removed", "Sixt Cousin Once Removed", "Seventh Cousin" )
            ];


            //4 arrays 2 arrays male and female for immediate(direct) and 2 arrays male and female for unimmediate(not direct)
            $OLDTOYOUNGDIRECTFAMILYRELATIONMALE = [array("Brother","Son","Grand-Son","Great-Grand-Son","2nd Great-Grand-Son", "3rd Great-Grand-Son", "4th Great-Grand-Son", "5th Great-Grand-Son"),
            array( "Son", null, null, null, null, null, null, null ),
            array( "Grand-Son", null, null, null, null, null, null, null ),
            array( "Great-Grand-Son", null, null, null, null, null, null, null ),
            array( "2nd Great-Grand-Son", null, null, null, null, null, null, null ),
            array( "3rd Great-Grand-Son", null, null, null, null, null, null, null ),
            array( "4th Great-Grand-Son", null, null, null, null, null, null, null ),
            array( "5th Great-Grand-Son", null, null, null, null, null, null, null )
            ];
            

        $OLDTOYOUNGDIRECTFAMILYRELATIONFEMALE = [
            array("Sister", "Daughter", "Grand-Daughter","Great-Grand-Daughter","2nd Great-Grand-Daughter", "3rd Great-Grand-Daughter", "4th Great-Grand-Daughter", "5th Great-Grand-Daughter" ),
            array( "Daughter", null, null, null, null, null, null, null ),
            array( "Grand-Daughter", null, null, null, null, null, null, null ),
            array( "Great-Grand-Daughter", null, null, null, null, null, null, null ),
            array( "2nd Great-Grand-Daughter", null, null, null, null, null, null, null ),
            array( "3rd Great-Grand-Daughter", null, null, null, null, null, null, null ),
            array( "4th Great-Grand-Daughter", null, null, null, null, null, null, null ),
            array( "5th Great-Grand-Daughter", null, null, null, null, null, null, null )
            ];

            $YOUNGTOOLDINDIRECTFAMILYRELATIONMALE = [
            array("Brother","Uncle","Grand-Uncle","Great-Grand-Uncle","2nd Great-Grand-Uncle", "3rd Great-Grand-Uncle", "4th Great-Grand-Uncle", "5th Great-Grand-Uncle" ),
            array( "Uncle", "First Cousin","First Cousin Once Removed","First Twice Removed","First Cousin 3x Removed","First Cousin 4x Removed", "First Cousin 5x Removed", "First Cousin 6x Removed" ),
            array( "Grand-Uncle", "First Cousin Once Removed","Second Cousin","Second Cousin Once Removed","Second Cousin Twice Removed","Second Cousin 3x Removed", "Second Cousin 4x Removed", "Second Cousin 5x Removed" ),
            array( "Great-Grand-Uncle", "First Cousin Twice Removed","Second Cousin Once Removed","Third Cousin","Third Cousin Once Removed","Third Cousin Twice Removed", "Third Cousin 3x Removed", "Third Cousin 4x Removed" ),
            array( "2nd Great-Grand-Uncle", "First Cousin 3x Removed","Second Cousin Twice Removed","Third Cousin Once Removed","Fourth Cousin","Fourth Cousin Once Removed", "Fourth Cousin Twice Removed", "Fourth Cousin 3x Removed" ),
            array( "3rd Great-Grand-Uncle", "First Cousin 4x Removed","Second Cousin 3x Removed","Third Cousin Twice Removed","Fourth Cousin Once Removed","Fifth Cousin", "Fifth Cousin Once Removed", "Fifth Cousin Twice Removed" ),
            array( "4th Great-Grand-Uncle", "First Cousin 5x Removed","Second Cousin 4x Removed","Third Cousin 3x Removed","Fourth Cousin Twice Removed","Fifth Cousin Once Removed", "Sixth Cousin", "Sixth Cousin Once Removed" ),
            array("5th Great-Grand-Uncle", "First Cousin 6x Removed","Second Cousin 5x Removed","Third Cousin 4x Removed","Fourth Cousin 3x Removed","Fifth Cousin Twice Removed", "Sixt Cousin Once Removed", "Seventh Cousin" )
            ];
            
        $YOUNGTOOLDINDIRECTFAMILYRELATIONFEMALE = [
            array("Sister","Aunt","Grand-Aunt","Great-Grand-Aunt","2nd Great-Grand-Aunt", "3rd Great-Grand-Aunt", "4th Great-Grand-Aunt", "5th Great-Grand-Aunt" ),
            array( "Aunt", "First Cousin","First Cousin Once Removed","First Twice Removed","First Cousin 3x Removed","First Cousin 4x Removed", "First Cousin 5x Removed", "First Cousin 6x Removed" ),
            array( "Grand-Aunt", "First Cousin Once Removed","Second Cousin","Second Cousin Once Removed","Second Cousin Twice Removed","Second Cousin 3x Removed", "Second Cousin 4x Removed", "Second Cousin 5x Removed" ),
            array( "Great-Grand-Aunt", "First Cousin Twice Removed","Second Cousin Once Removed","Third Cousin","Third Cousin Once Removed","Third Cousin Twice Removed", "Third Cousin 3x Removed", "Third Cousin 4x Removed" ),
            array( "2nd Great-Grand-Aunt", "First Cousin 3x Removed","Second Cousin Twice Removed","Third Cousin Once Removed","Fourth Cousin","Fourth Cousin Once Removed", "Fourth Cousin Twice Removed", "Fourth Cousin 3x Removed" ),
            array( "3rd Great-Grand-Aunt", "First Cousin 4x Removed","Second Cousin 3x Removed","Third Cousin Twice Removed","Fourth Cousin Once Removed","Fifth Cousin", "Fifth Cousin Once Removed", "Fifth Cousin Twice Removed" ),
            array( "4th Great-Grand-Aunt", "First Cousin 5x Removed","Second Cousin 4x Removed","Third Cousin 3x Removed","Fourth Cousin Twice Removed","Fifth Cousin Once Removed", "Sixth Cousin", "Sixth Cousin Once Removed" ),
            array( "5th Great-Grand-Aunt", "First Cousin 6x Removed","Second Cousin 5x Removed","Third Cousin 4x Removed","Fourth Cousin 3x Removed","Fifth Cousin Twice Removed", "Sixt Cousin Once Removed", "Seventh Cousin" )
            ];
        
            $YOUNGTOOLDDIRECTFAMILYRELATIONMALE =[
            array("Brother","Father","Grand-Father","Great-Grand-Father","2nd Great-Grand-Father", "3rd Great-Grand-Father", "4th Great-Grand-Father", "5th Great-Grand-Father" ),
            array( "Father", null, null, null, null, null, null, null ),
            array( "Grand-Father", null, null, null, null, null, null, null ),
            array( "Great-Grand-Father", null, null, null, null, null, null, null ),
            array( "2nd Great-Grand-Father", null, null, null, null, null, null, null ),
            array( "3rd Great-Grand-Father", null, null, null, null, null, null, null ),
            array( "4th Great-Grand-Father", null, null, null, null, null, null, null ),
            array( "5th Great-Grand-Father", null, null, null, null, null, null, null)
            ];

            $YOUNGTOOLDDIRECTFAMILYRELATIONFEMALE =[
            array("Brother","Mother","Grand-Mother","Great-Grand-Mother","2nd Great-Grand-Mother", "3rd Great-Grand-Mother", "4th Great-Grand-Mother", "5th Great-Grand-Mother" ),
            array( "Mother", null, null, null, null, null, null, null ),
            array( "Grand-Mother", null, null, null, null, null, null, null ),
            array( "Great-Grand-Mother", null, null, null, null, null, null, null ),
            array( "2nd Great-Grand-Mother", null, null, null, null, null, null, null ),
            array( "3rd Great-Grand-Mother", null, null, null, null, null, null, null ),
            array( "4th Great-Grand-Mother", null, null, null, null, null, null, null ),
            array( "5th Great-Grand-Mother", null, null, null, null, null, null, null)
            ];

            $relationship = "";

            if ($genderSecondPerson=="Male")
            {
                $relationship = $this->Relationship($firstPersonLevel, $secondPersonLevel, $person2, $YOUNGTOOLDDIRECTFAMILYRELATIONMALE, $OLDTOYOUNGDIRECTFAMILYRELATIONMALE, $YOUNGTOOLDINDIRECTFAMILYRELATIONMALE, $OLDTOYOUNGINDIRECTFAMILYRELATIONMALE,$directtree);
            }
            else // Female  
            {
                $relationship = $this->Relationship($firstPersonLevel, $secondPersonLevel, $person2, $YOUNGTOOLDDIRECTFAMILYRELATIONFEMALE, $OLDTOYOUNGDIRECTFAMILYRELATIONFEMALE, $YOUNGTOOLDINDIRECTFAMILYRELATIONFEMALE, $OLDTOYOUNGINDIRECTFAMILYRELATIONFEMALE,$directtree);
            }
            return $relationship;
        }
    
        private function Relationship($firstPersonLevel, $secondPersonLevel, $person2, $YoungToOldDirectRelation, $OldToYoungDirectRelation, $YoungToOldIndirectRelation, $OldToYoungIndirectRelation,$directtree)
        {
            $relationship = "";
            if ($this->SearchIfDirectFamily($person2,$directtree))  // Directfamily
            {
                if ($firstPersonLevel > $secondPersonLevel)    // lefside person is YOUNGER
                {
                    $relationship = $YoungToOldDirectRelation[$firstPersonLevel][$secondPersonLevel];      
                }
                else   // leftside person is OLDER
                {
                    $relationship = $OldToYoungDirectRelation[$firstPersonLevel][$secondPersonLevel];      
                }
            }
            else       // Indirectfamily
            {
                if ($firstPersonLevel > $secondPersonLevel)     // leftside person is YOUNGER
                {
                    $relationship = $YoungToOldIndirectRelation[$firstPersonLevel][$secondPersonLevel];
                }
                else    // leftside is OLDER
                {
                    if(!empty($firstPersonLevel)&&!empty($secondPersonLevel)){
                    $relationship = $OldToYoungIndirectRelation[$firstPersonLevel][$secondPersonLevel];
                    }
                }
            }
            return $relationship;
        }
        
        public function SearchIfDirectFamily($person2,$directtree)
        {
            $direct = false;

            for ($i = 0; $i < count($directtree); $i++)
            {
                for ($j = 0; $j < count($directtree[$i]); $j++)
                {

                    if (!empty($directtree[$i][$j]))
                    {
                        if ($directtree[$i][$j]['name_slug']==$person2)
                        {
                            $direct = true; return $direct;
                        }
                    }
                    else
                    {
                        break;
                    }
                }
            }
            return $direct;
        }
    }
?>
