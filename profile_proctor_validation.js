function proctorDetailsValidation(){
    var designation = document.getElementById('designation').value;
    var name = document.getElementById('name').value;
    var office = document.getElementById('office').value;
    var phone = document.getElementById('phone').value;
            if (!name) 
           {
               putError("Name is required.");
               return false;
           }
           if (!designation) 
           {
               putError("Designation is required.");
               return false;
           }

           if (!office) 
           {
               putError("Office is required.");
               return false;
           }
           if(!phone){
            putError("Phone number is required.");
               return false;
           }
    



           return true;
 }

 function putError(str){
     document.getElementById('errors').innerHTML = "<div class='notification is-danger'>" + str + "</div>";
 }