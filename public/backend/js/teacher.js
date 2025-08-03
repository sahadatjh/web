var lineNo = 2; 
var html = ""; 

$(document).ready(function () { 
    $(".addRow").click(function () { 

        var id_no = "tr_"+lineNo;

        html = '<tr id="'+id_no+'">'+
                '<td><input type="text" name="institution_name[]" id="institution_name" class="form-control" required></td>'+
                '<td><input type="text" name="exam_name[]" id="exam_name" class="form-control" required></td>'+
                '<td><input type="number" name="passing_year[]" id="passing_year" class="form-control" required></td>'+
                '<td><input type="number" name="cgpa[]" id="cgpa" class="form-control" required></td>'+
                '<td><p align="center"><span class="btn btn-danger" onclick="deleteRow('+lineNo+')">Delete</span> </p></td></tr>';

        tableBody = $(".education_table .education_body"); //Getting table element with selector 
        tableBody.append(html); //Appending the table row 
        lineNo++; //Counter to keep track of added rows
    });

}); 


function deleteRow(row_no){

    // console.log(row_no+' , '+sub_id);

    if (confirm("Are you sure?")){

        $('.education_table .education_body #tr_'+row_no).remove();

    }
} 