$(document).ready(function(){

  

    // delete confirmation in an alert message
    // function delete_news(id, title){
    //       if(confirm('Are you sure to delete this news? (News Title: "'+title+'")'))
    //       {
    //         // ajax delete data from database
    //           $.ajax({
    //             url : "<?php echo site_url('admins/deletenews')?>/"+id,
    //             type: "POST",
    //             dataType: "JSON",
    //             success: function(data)
    //             {
    //               location.reload();
    //             },
    //             error: function (jqXHR, textStatus, errorThrown)
    //             {
    //                 alert('Error deleting data');
    //             }
    //         });

    //       }
    // }
    
   // delete confirmation using a modal
      //pass data from to modal
      $('.confirm-delete').on('click', function(e) {
          e.preventDefault();

          var id = $(this).data('id');
          var url = $(this).data('url');
          $('#deleteModal').data('id', id).modal('show');
          $('#deleteModal').data('url', url);
      });
      //button in a modal
      $('#btnConfirm').click(function() {
          var id = $('#deleteModal').data('id');
          var url = $('#deleteModal').data('url');
          $('#deleteModal').modal('hide');
          $.ajax({
                  url : url+id,
                  type: "POST",
                  dataType: "JSON",
                  success: function(data)
                  {
                    location.reload();
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                      alert('Error deleting data');
                  }
              });
      });

      $('.view-profile').on('click', function(e){
          e.preventDefault();

        var profile = $(this).data('profile');
        var citizens = $(this).data('citizens');
        
        //var dimensions = { width: 10, height: 15, length: 20 };
// var keys = $.map( citizens, function( value, key ) {
//     var r;
//     if(value.id == 4)
//     {
//         r = value.father;
//     }
//   return r;
// });
            
       
            $('#familyModal').modal('show');
            
            $('#lastname').val(profile['lastname']);
            $('#firstname').val(profile['firstname']);
            $('#middlename').val(profile['middlename']);
            $('#address').val(profile['address']);
            $('#contact').val(profile['contact']);
            console.log("ma name is"+profile['name_slug']);
            var html = '';
            for(var i = 0; i < citizens.length; i++){
               
                if(profile['name_slug']==citizens[i][2]){
            html += '<tr><td>' + citizens[i][0]['lastname'] + 
                    '</td><td>' + citizens[i][0]['firstname'] +
                    '</td><td>' + citizens[i][0]['middlename'] +
                    '</td><td>' + citizens[i][0]['gender'] +
                    '</td><td>' + citizens[i][0]['address'] +
                    '</td><td>' + citizens[i][0]['contact'] + 
                    '</td><td>' + citizens[i][1] +'</td></tr>';
                }
            }
            // citizens.forEach(element => {
            //     // console.log(element[0]['name_slug']);
            //     // console.log(element[1]);
            //     html += '<tr><td>' + element[0]['lastname'] + 
            //     '</td><td>' + citizens[i].firstname +
            //     '</td><td>' + citizens[i].middlename +
            //     '</td><td>' + citizens[i].gender +
            //     '</td><td>' + citizens[i].address +
            //     '</td><td>' + citizens[i].contact + '</td></tr>';
            // });
            $('#familyTable tbody').append(html);  
        // var OLDTOYOUNGINDIRECTFAMILYRELATIONMALE = [["Brother","Nephew","Grand-Nephew","Great-Grand-Nephew","2nd Great-Grand-Nephew", "3rd Great-Grand-Nephew", "4th Great-Grand-Nephew", "5th Great-Grand-Nephew" ],
        // [ "Nephew", "First Cousin","First Cousin Once Removed","First Twice Removed","First Cousin 3x Removed","First Cousin 4x Removed", "First Cousin 5x Removed", "First Cousin 6x Removed" ],
        // [ "Grand-Newphew", "First Cousin Once Removed","Second Cousin","Second Cousin Once Removed","Second Cousin Twice Removed","Second Cousin 3x Removed", "Second Cousin 4x Removed", "Second Cousin 5x Removed" ],
        // [ "Great-Grand-Nephew", "First Cousin Twice Removed","Second Cousin Once Removed","Third Cousin","Third Cousin Once Removed","Third Cousin Twice Removed", "Third Cousin 3x Removed", "Third Cousin 4x Removed" ],
        // [ "2nd Great-Grand-Nephew", "First Cousin 3x Removed","Second Cousin Twice Removed","Third Cousin Once Removed","Fourth Cousin","Fourth Cousin Once Removed", "Fourth Cousin Twice Removed", "Fourth Cousin 3x Removed" ],
        // [ "3rd Great-Grand-Nephew", "First Cousin 4x Removed","Second Cousin 3x Removed","Third Cousin Twice Removed","Fourth Cousin Once Removed","Fifth Cousin", "Fifth Cousin Once Removed", "Fifth Cousin Twice Removed" ],
        // [ "4th Great-Grand-Nephew", "First Cousin 5x Removed","Second Cousin 4x Removed","Third Cousin 3x Removed","Fourth Cousin Twice Removed","Fifth Cousin Once Removed", "Sixth Cousin", "Sixth Cousin Once Removed" ],
        // [ "5th Great-Grand-Nephew", "First Cousin 6x Removed","Second Cousin 5x Removed","Third Cousin 4x Removed","Fourth Cousin 3x Removed","Fifth Cousin Twice Removed", "Sixt Cousin Once Removed", "Seventh Cousin" ]];
    
        // var OLDTOYOUNGINDIRECTFAMILYRELATIONFEMALE = [["Sister","Niece","Grand-Niece","Great-Grand-Niece","2nd Great-Grand-Niece", "3rd Great-Grand-Niece", "4th Great-Grand-Niece", "5th Great-Grand-Niece" ],
        // [ "Nephew", "First Cousin","First Cousin Once Removed","First Twice Removed","First Cousin 3x Removed","First Cousin 4x Removed", "First Cousin 5x Removed", "First Cousin 6x Removed" ],
        // [ "Grand-Niece", "First Cousin Once Removed","Second Cousin","Second Cousin Once Removed","Second Cousin Twice Removed","Second Cousin 3x Removed", "Second Cousin 4x Removed", "Second Cousin 5x Removed" ],
        // [ "Great-Grand-Niece", "First Cousin Twice Removed","Second Cousin Once Removed","Third Cousin","Third Cousin Once Removed","Third Cousin Twice Removed", "Third Cousin 3x Removed", "Third Cousin 4x Removed" ],
        // [ "2nd Great-Grand-Niece", "First Cousin 3x Removed","Second Cousin Twice Removed","Third Cousin Once Removed","Fourth Cousin","Fourth Cousin Once Removed", "Fourth Cousin Twice Removed", "Fourth Cousin 3x Removed" ],
        // [ "3rd Great-Grand-Niece", "First Cousin 4x Removed","Second Cousin 3x Removed","Third Cousin Twice Removed","Fourth Cousin Once Removed","Fifth Cousin", "Fifth Cousin Once Removed", "Fifth Cousin Twice Removed" ],
        // [ "4th Great-Grand-Niece", "First Cousin 5x Removed","Second Cousin 4x Removed","Third Cousin 3x Removed","Fourth Cousin Twice Removed","Fifth Cousin Once Removed", "Sixth Cousin", "Sixth Cousin Once Removed" ],
        // [ "5th Great-Grand-Niece", "First Cousin 6x Removed","Second Cousin 5x Removed","Third Cousin 4x Removed","Fourth Cousin 3x Removed","Fifth Cousin Twice Removed", "Sixt Cousin Once Removed", "Seventh Cousin" ]];
       
        // var OLDTOYOUNGDIRECTFAMILYRELATIONMALE = [["Brother","Son","Grand-Son","Great-Grand-Son","2nd Great-Grand-Son", "3rd Great-Grand-Son", "4th Great-Grand-Son", "5th Great-Grand-Son" ],
        // [ "Son", null, null, null, null, null, null, null ],
        // [ "Grand-Son", null, null, null, null, null, null, null ],
        // [ "Great-Grand-Son", null, null, null, null, null, null, null ],
        // [ "2nd Great-Grand-Son", null, null, null, null, null, null, null ],
        // [ "3rd Great-Grand-Son", null, null, null, null, null, null, null ],
        // [ "4th Great-Grand-Son", null, null, null, null, null, null, null ],
        // [ "5th Great-Grand-Son", null, null, null, null, null, null, null ]];

        // var OLDTOYOUNGDIRECTFAMILYRELATIONFEMALE =  [["Sister", "Daughter", "Grand-Daughter","Great-Grand-Daughter","2nd Great-Grand-Daughter", "3rd Great-Grand-Daughter", "4th Great-Grand-Daughter", "5th Great-Grand-Daughter" ],
        // [ "Daughter", null, null, null, null, null, null, null ],
        // [ "Grand-Daughter", null, null, null, null, null, null, null ],
        // [ "Great-Grand-Daughter", null, null, null, null, null, null, null ],
        // [ "2nd Great-Grand-Daughter", null, null, null, null, null, null, null ],
        // [ "3rd Great-Grand-Daughter", null, null, null, null, null, null, null ],
        // [ "4th Great-Grand-Daughter", null, null, null, null, null, null, null ],
        // [ "5th Great-Grand-Daughter", null, null, null, null, null, null, null ]];

        // var YOUNGTOOLDINDIRECTFAMILYRELATIONMALE =  [["Brother","Uncle","Grand-Uncle","Great-Grand-Uncle","2nd Great-Grand-Uncle", "3rd Great-Grand-Uncle", "4th Great-Grand-Uncle", "5th Great-Grand-Uncle" ],
        // [ "Uncle", "First Cousin","First Cousin Once Removed","First Twice Removed","First Cousin 3x Removed","First Cousin 4x Removed", "First Cousin 5x Removed", "First Cousin 6x Removed" ],
        // [ "Grand-Uncle", "First Cousin Once Removed","Second Cousin","Second Cousin Once Removed","Second Cousin Twice Removed","Second Cousin 3x Removed", "Second Cousin 4x Removed", "Second Cousin 5x Removed" ],
        // [ "Great-Grand-Uncle", "First Cousin Twice Removed","Second Cousin Once Removed","Third Cousin","Third Cousin Once Removed","Third Cousin Twice Removed", "Third Cousin 3x Removed", "Third Cousin 4x Removed" ],
        // [ "2nd Great-Grand-Uncle", "First Cousin 3x Removed","Second Cousin Twice Removed","Third Cousin Once Removed","Fourth Cousin","Fourth Cousin Once Removed", "Fourth Cousin Twice Removed", "Fourth Cousin 3x Removed" ],
        // [ "3rd Great-Grand-Uncle", "First Cousin 4x Removed","Second Cousin 3x Removed","Third Cousin Twice Removed","Fourth Cousin Once Removed","Fifth Cousin", "Fifth Cousin Once Removed", "Fifth Cousin Twice Removed" ],
        // [ "4th Great-Grand-Uncle", "First Cousin 5x Removed","Second Cousin 4x Removed","Third Cousin 3x Removed","Fourth Cousin Twice Removed","Fifth Cousin Once Removed", "Sixth Cousin", "Sixth Cousin Once Removed" ],
        // [ "5th Great-Grand-Uncle", "First Cousin 6x Removed","Second Cousin 5x Removed","Third Cousin 4x Removed","Fourth Cousin 3x Removed","Fifth Cousin Twice Removed", "Sixt Cousin Once Removed", "Seventh Cousin" ]];

        // var YOUNGTOOLDINDIRECTFAMILYRELATIONFEMALE =  [["Sister","Aunt","Grand-Aunt","Great-Grand-Aunt","2nd Great-Grand-Aunt", "3rd Great-Grand-Aunt", "4th Great-Grand-Aunt", "5th Great-Grand-Aunt" ],
        // [ "Aunt", "First Cousin","First Cousin Once Removed","First Twice Removed","First Cousin 3x Removed","First Cousin 4x Removed", "First Cousin 5x Removed", "First Cousin 6x Removed" ],
        // [ "Grand-Aunt", "First Cousin Once Removed","Second Cousin","Second Cousin Once Removed","Second Cousin Twice Removed","Second Cousin 3x Removed", "Second Cousin 4x Removed", "Second Cousin 5x Removed" ],
        // [ "Great-Grand-Aunt", "First Cousin Twice Removed","Second Cousin Once Removed","Third Cousin","Third Cousin Once Removed","Third Cousin Twice Removed", "Third Cousin 3x Removed", "Third Cousin 4x Removed" ],
        // [ "2nd Great-Grand-Aunt", "First Cousin 3x Removed","Second Cousin Twice Removed","Third Cousin Once Removed","Fourth Cousin","Fourth Cousin Once Removed", "Fourth Cousin Twice Removed", "Fourth Cousin 3x Removed" ],
        // [ "3rd Great-Grand-Aunt", "First Cousin 4x Removed","Second Cousin 3x Removed","Third Cousin Twice Removed","Fourth Cousin Once Removed","Fifth Cousin", "Fifth Cousin Once Removed", "Fifth Cousin Twice Removed" ],
        // [ "4th Great-Grand-Aunt", "First Cousin 5x Removed","Second Cousin 4x Removed","Third Cousin 3x Removed","Fourth Cousin Twice Removed","Fifth Cousin Once Removed", "Sixth Cousin", "Sixth Cousin Once Removed" ],
        // [ "5th Great-Grand-Aunt", "First Cousin 6x Removed","Second Cousin 5x Removed","Third Cousin 4x Removed","Fourth Cousin 3x Removed","Fifth Cousin Twice Removed", "Sixt Cousin Once Removed", "Seventh Cousin" ]];

        // var YOUNGTOOLDDIRECTFAMILYRELATIONMALE = [["Brother","Father","Grand-Father","Great-Grand-Father","2nd Great-Grand-Father", "3rd Great-Grand-Father", "4th Great-Grand-Father", "5th Great-Grand-Father" ],
        // [ "Father", null, null, null, null, null, null, null ],
        // [ "Grand-Father", null, null, null, null, null, null, null ],
        // [ "Great-Grand-Father", null, null, null, null, null, null, null ],
        // [ "2nd Great-Grand-Father", null, null, null, null, null, null, null ],
        // [ "3rd Great-Grand-Father", null, null, null, null, null, null, null ],
        // [ "4th Great-Grand-Father", null, null, null, null, null, null, null ],
        // [ "5th Great-Grand-Father", null, null, null, null, null, null, null ]];

        // var YOUNGTOOLDDIRECTFAMILYRELATIONFEMALE =  [["Brother","Mother","Grand-Mother","Great-Grand-Mother","2nd Great-Grand-Mother", "3rd Great-Grand-Mother", "4th Great-Grand-Mother", "5th Great-Grand-Mother" ],
        // [ "Mother", null, null, null, null, null, null, null ],
        // [ "Grand-Mother", null, null, null, null, null, null, null ],
        // [ "Great-Grand-Mother", null, null, null, null, null, null, null ],
        // [ "2nd Great-Grand-Mother", null, null, null, null, null, null, null ],
        // [ "3rd Great-Grand-Mother", null, null,   null, null, null, null, null ],
        // [ "4th Great-Grand-Mother", null, null, null, null, null, null, null ],
        // [ "5th Great-Grand-Mother", null, null, null, null, null, null, null ]];

        
          //relationship checker
        
    
       
      });
   
    $('#familyModal').on('hidden.bs.modal', function() {
        $('#familyModal').modal('hide');
        $('#familyTable tbody').children().remove();
        
    });

    // function SupplyFamilyTree(personName)
    //     {
    //         familyTree = [];                   // declaration of FamilyTree
                  

    //         try
    //         {
    //             var count = 1;                      //para sa max size of inner arrays
    //             var indexInPreviousLevel = 0;       //nag ttraverse sa previous level para pang supply ng father and mother

    //             familyTree[0][0] = PersonList.Where(p => p.name.Equals(personName)).SingleOrDefault();   //for the root node, kung sino yung pinagcocompare
    //             for (var x = 1; x < familyTree.Length; x++)             
    //             {
    //                 indexInPreviousLevel = 0;
    //                 count *= 2;

    //                 for (var y = 0; y < count; y++)
    //                 {
    //                     if (familyTree[x - 1][indexInPreviousLevel])          // supply father and mother of the person in the previous level
    //                     {
    //                         var father = PersonList.Where(p => p.name.Equals(familyTree[x - 1][indexInPreviousLevel].father)).SingleOrDefault() ?? null;
    //                         familyTree[x][y] = father;
    //                         y++;
    //                         var mother = PersonList.Where(p => p.name.Equals(familyTree[x - 1][indexInPreviousLevel].mother)).SingleOrDefault();
    //                         familyTree[x][y] = mother;
    //                         indexInPreviousLevel++;
    //                     }
                        
    //                 }
    //             }
    //             return familyTree;
    //         }
    //         catch (e)
    //         {
    //             Console.WriteLine(e);
    //             return familyTree;
    //         }
    //     }
});  