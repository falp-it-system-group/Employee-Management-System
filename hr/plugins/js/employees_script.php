<script type="text/javascript">
$( document ).ready(function() {
    fetch_dept_dropdown();
    fetch_group_dropdown();
    fetch_section_dropdown();
    fetch_sub_section_dropdown();
    fetch_shuttle_route_dropdown();
    fetch_position_dropdown();
    fetch_process_dropdown();
    fetch_provider_dropdown();
    load_employees(1);
});

document.getElementById("emp_no_master_search").addEventListener("keyup", e => {
    load_employees(1);
});

document.getElementById("full_name_master_search").addEventListener("keyup", e => {
    load_employees(1);
});

document.getElementById("section_master_search").addEventListener("keyup", e => {
    load_employees(1);
});

document.getElementById("line_no_master_search").addEventListener("keyup", e => {
    load_employees(1);
});

// Table Responsive Scroll Event for Load More
document.getElementById("list_of_employees_res").addEventListener("scroll", function() {
    var scrollTop = document.getElementById("list_of_employees_res").scrollTop;
    var scrollHeight = document.getElementById("list_of_employees_res").scrollHeight;
    var offsetHeight = document.getElementById("list_of_employees_res").offsetHeight;

    //check if the scroll reached the bottom
    if ((offsetHeight + scrollTop + 1) >= scrollHeight) {
        get_next_page();
    }
});

const get_next_page = () => {
    var current_page = parseInt(sessionStorage.getItem('list_of_employees_table_pagination'));
    let total = sessionStorage.getItem('count_rows');
    var last_page = parseInt(sessionStorage.getItem('last_page'));
    var next_page = current_page + 1;
    if (next_page <= last_page && total > 0) {
        load_employees(next_page);
    }
}

const fetch_dept_dropdown =()=>{
    $.ajax({
        url:'../process/hr/employees/emp-masterlist_p.php',
        type:'POST',
        cache:false,
        data:{
            method:'fetch_dept_dropdown'
        },
        success:function(response){
            $('#dept_master').html(response);
            $('#dept_master_search').html(response);
            $('#dept_master_update').html(response);
        }
    });
}

const fetch_group_dropdown =()=>{
    $.ajax({
        url:'../process/hr/employees/emp-masterlist_p.php',
        type:'POST',
        cache:false,
        data:{
            method:'fetch_group_dropdown'
        },
        success:function(response){
            $('#group_master').html(response);
            $('#group_master_update').html(response);
        }
    });
}

const fetch_section_dropdown =()=>{
    $.ajax({
        url:'../process/hr/employees/emp-masterlist_p.php',
        type:'POST',
        cache:false,
        data:{
            method:'fetch_section_dropdown'
        },
        success:function(response){
            $('#section_master').html(response);
            $('#section_master_update').html(response);
        }
    });
}

const fetch_sub_section_dropdown =()=>{
    $.ajax({
        url:'../process/hr/employees/emp-masterlist_p.php',
        type:'POST',
        cache:false,
        data:{
            method:'fetch_sub_section_dropdown'
        },
        success:function(response){
            $('#sub_section_master').html(response);
            $('#sub_section_master_update').html(response);
        }
    });
}

const get_laf_approver_dropdowns = opt => {
    let dept = '';
    let section = '';
    let line_no = '';

    if (opt == 1) {
        dept = document.getElementById('dept_master').value;
        section = document.getElementById('section_master').value;
        line_no = document.getElementById('line_no_master').value;
    } else if (opt == 2) {
        dept = document.getElementById('dept_master_update').value;
        section = document.getElementById('section_master_update').value;
        line_no = document.getElementById('line_no_master_update').value;
    }

    fetch_employee_name_js_s_dropdown(dept, section, line_no, opt);
    fetch_employee_name_sv_dropdown(dept, section, line_no, opt);
    fetch_employee_name_approver_dropdown(dept, section, line_no, opt);
}

const fetch_line_dropdown = opt => {
    let section = '';

    if (opt == 1) {
        section = document.getElementById('section_master').value;
    } else if (opt == 2) {
        section = document.getElementById('section_master_update').value;
    }

    $.ajax({
        url:'../process/hr/employees/emp-masterlist_p.php',
        type:'POST',
        cache:false,
        data:{
            method:'fetch_line_dropdown',
            section:section
        },
        success:function(response){
            $('#line_no_master').html(response);
            $('#line_no_master_update').html(response);
            get_laf_approver_dropdowns(opt);
        }
    });
}

const fetch_line_dropdown_details = () => {
    let section = document.getElementById('section_master_update').value;
    $.ajax({
        url:'../process/hr/employees/emp-masterlist_p.php',
        type:'POST',
        cache:false,
        data:{
            method:'fetch_line_dropdown',
            section:section
        },
        success:function(response){
            $('#line_no_master_update').html(response);
        }
    });
}

const fetch_shuttle_route_dropdown =()=>{
    $.ajax({
        url:'../process/admin/shuttle_allocation/sa_p.php',
        type:'POST',
        cache:false,
        data:{
            method:'fetch_shuttle_route_dropdown'
        },
        success:function(response){
            $('#shuttle_route_master_update').html(response);
        }
    });
}

const fetch_position_dropdown =()=>{
    $.ajax({
        url:'../process/hr/employees/emp-masterlist_p.php',
        type:'POST',
        cache:false,
        data:{
            method:'fetch_position_dropdown'
        },
        success:function(response){
            $('#position_master_update').html(response);
        }
    });
}

const fetch_process_dropdown =()=>{
    $.ajax({
        url:'../process/hr/employees/emp-masterlist_p.php',
        type:'POST',
        cache:false,
        data:{
            method:'fetch_process_dropdown'
        },
        success:function(response){
            $('#process_master').html(response);
            $('#process_master_update').html(response);
        }
    });
}

const fetch_provider_dropdown =()=>{
    $.ajax({
        url:'../process/hr/employees/emp-masterlist_p.php',
        type:'POST',
        cache:false,
        data:{
            method:'fetch_provider_dropdown'
        },
        success:function(response){
            $('#provider_master_update').html(response);
            $('#provider_master_search').html(response);
        }
    });
}

const fetch_employee_name_js_s_dropdown = (dept, section, line_no, opt) =>{
    $.ajax({
        url:'../process/hr/employees/emp-masterlist_p.php',
        type:'POST',
        cache:false,
        data:{
            method:'fetch_employee_name_js_s_dropdown',
            dept:dept,
            section:section,
            line_no:line_no
        },
        success:function(response){
            if (opt == 1) {
                $('#emp_js_s_master').html(response);
            } else if (opt == 2) {
                $('#emp_js_s_master_update').html(response);
            }
        }
    });
}

const fetch_employee_name_sv_dropdown = (dept, section, line_no, opt) =>{
    $.ajax({
        url:'../process/hr/employees/emp-masterlist_p.php',
        type:'POST',
        cache:false,
        data:{
            method:'fetch_employee_name_sv_dropdown',
            dept:dept,
            section:section,
            line_no:line_no
        },
        success:function(response){
            if (opt == 1) {
                $('#emp_sv_master').html(response);
            } else if (opt == 2) {
                $('#emp_sv_master_update').html(response);
            }
        }
    });
}

const fetch_employee_name_approver_dropdown = (dept, section, line_no, opt) =>{
    $.ajax({
        url:'../process/hr/employees/emp-masterlist_p.php',
        type:'POST',
        cache:false,
        data:{
            method:'fetch_employee_name_approver_dropdown',
            dept:dept,
            section:section,
            line_no:line_no
        },
        success:function(response){
            if (opt == 1) {
                $('#emp_approver_master').html(response);
            } else if (opt == 2) {
                $('#emp_approver_master_update').html(response);
            }
        }
    });
}

const count_employee_list = () => {
    var emp_no = sessionStorage.getItem('emp_no_master_search');
    var full_name = sessionStorage.getItem('full_name_master_search');
    var provider = sessionStorage.getItem('provider_master_search');
    var dept = sessionStorage.getItem('dept_master_search');
    var section = sessionStorage.getItem('section_master_search');
    var line_no = sessionStorage.getItem('line_no_master_search');
    var date_updated_from = sessionStorage.getItem('date_updated_from_master_search');
    var date_updated_to = sessionStorage.getItem('date_updated_to_master_search');
    var resigned = sessionStorage.getItem('resigned_master_search');
    $.ajax({
        url:'../process/hr/employees/emp-masterlist_p.php',
        type:'POST',
        cache:false,
        data:{
            method:'count_employee_list',
            emp_no:emp_no,
            full_name:full_name,
            provider:provider,
            dept:dept,
            section:section,
            line_no:line_no,
            date_updated_from:date_updated_from,
            date_updated_to:date_updated_to,
            resigned:resigned
        }, 
        success:function(response){
            sessionStorage.setItem('count_rows', response);
            var count = `Total: ${response}`;
            $('#list_of_employees_info').html(count);

            if (response > 0) {
                load_employees_last_page();
            } else {
                document.getElementById("btnNextPage").style.display = "none";
                document.getElementById("btnNextPage").setAttribute('disabled', true);
            }
        }
    });
}

const load_employees_last_page = () =>{
    var emp_no = sessionStorage.getItem('emp_no_master_search');
    var full_name = sessionStorage.getItem('full_name_master_search');
    var provider = sessionStorage.getItem('provider_master_search');
    var dept = sessionStorage.getItem('dept_master_search');
    var section = sessionStorage.getItem('section_master_search');
    var line_no = sessionStorage.getItem('line_no_master_search');
    var date_updated_from = sessionStorage.getItem('date_updated_from_master_search');
    var date_updated_to = sessionStorage.getItem('date_updated_to_master_search');
    var current_page = parseInt(sessionStorage.getItem('list_of_employees_table_pagination'));
    var resigned = sessionStorage.getItem('resigned_master_search');
    $.ajax({
        url:'../process/hr/employees/emp-masterlist_p.php',
        type:'POST',
        cache:false,
        data:{
            method:'employee_list_last_page',
            emp_no:emp_no,
            full_name:full_name,
            provider:provider,
            dept:dept,
            section:section,
            line_no:line_no,
            date_updated_from:date_updated_from,
            date_updated_to:date_updated_to,
            resigned:resigned
        },
        success:function(response){
            sessionStorage.setItem('last_page', response);
            let total = sessionStorage.getItem('count_rows');
            var next_page = current_page + 1;
            if (next_page > response || total < 1) {
                document.getElementById("btnNextPage").style.display = "none";
                document.getElementById("btnNextPage").setAttribute('disabled', true);
            } else {
                document.getElementById("btnNextPage").style.display = "block";
                document.getElementById("btnNextPage").removeAttribute('disabled');
            }
        }
    });
}

const load_employees = current_page => {
    var emp_no = document.getElementById('emp_no_master_search').value;
    var full_name = document.getElementById('full_name_master_search').value;
    var provider = document.getElementById('provider_master_search').value;
    var dept = document.getElementById('dept_master_search').value;
    var section = document.getElementById('section_master_search').value;
    var line_no = document.getElementById('line_no_master_search').value;
    var date_updated_from = document.getElementById('date_updated_from_master_search').value;
    var date_updated_to = document.getElementById('date_updated_to_master_search').value;
    var resigned = document.getElementById('resigned_master_search').value;

    var emp_no1 = sessionStorage.getItem('emp_no_master_search');
    var full_name1 = sessionStorage.getItem('full_name_master_search');
    var provider1 = sessionStorage.getItem('provider_master_search');
    var dept1 = sessionStorage.getItem('dept_master_search');
    var section1 = sessionStorage.getItem('section_master_search');
    var line_no1 = sessionStorage.getItem('line_no_master_search');
    var date_updated_from1 = sessionStorage.getItem('date_updated_from_master_search');
    var date_updated_to1 = sessionStorage.getItem('date_updated_to_master_search');
    var resigned1 = sessionStorage.getItem('resigned_master_search');

    if ((date_updated_from == '' && date_updated_to != '') || (date_updated_from != '' && date_updated_to == '')) {
        Swal.fire({
            icon: 'info',
            title: 'Please fill out all date fields',
            text: 'Information',
            showConfirmButton: false,
            timer : 1000
        }); 
    } else {
        if (current_page > 1) {
            switch(true) {
                case emp_no !== emp_no1:
                case full_name !== full_name1:
                case provider !== provider1:
                case dept !== dept1:
                case section !== section1:
                case line_no !== line_no1:
                case date_updated_from !== date_updated_from1:
                case date_updated_to !== date_updated_to1:
                case resigned !== resigned1:
                    emp_no = emp_no1;
                    full_name = full_name1;
                    provider = provider1;
                    dept = dept1;
                    section = section1;
                    line_no = line_no1;
                    date_updated_from = date_updated_from1;
                    date_updated_to = date_updated_to1;
                    resigned = resigned1;
                    break;
                default:
            }
        } else {
            sessionStorage.setItem('emp_no_master_search', emp_no);
            sessionStorage.setItem('full_name_master_search', full_name);
            sessionStorage.setItem('provider_master_search', provider);
            sessionStorage.setItem('dept_master_search', dept);
            sessionStorage.setItem('section_master_search', section);
            sessionStorage.setItem('line_no_master_search', line_no);
            sessionStorage.setItem('date_updated_from_master_search', date_updated_from);
            sessionStorage.setItem('date_updated_to_master_search', date_updated_to);
            sessionStorage.setItem('resigned_master_search', resigned);
        }

        $.ajax({
            url:'../process/hr/employees/emp-masterlist_p.php',
            type:'POST',
            cache:false,
            data:{
                method:'employee_list',
                emp_no:emp_no,
                full_name:full_name,
                provider:provider,
                dept:dept,
                section:section,
                line_no:line_no,
                date_updated_from:date_updated_from,
                date_updated_to:date_updated_to,
                resigned:resigned,
                current_page:current_page
            },
            beforeSend: () => {
                var loading = `<tr id="loading"><td colspan="8" style="text-align:center;"><div class="spinner-border text-dark" role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
                if (current_page == 1) {
                    document.getElementById("list_of_employees").innerHTML = loading;
                } else {
                    $('#list_of_employees_table tbody').append(loading);
                }
            }, 
            success:function(response){
                $('#loading').remove();
                if (current_page == 1) {
                    $('#list_of_employees_table tbody').html(response);
                } else {
                    $('#list_of_employees_table tbody').append(response);
                }
                sessionStorage.setItem('list_of_employees_table_pagination', current_page);
                count_employee_list();
            }
        });
    }
}

$("#new_employee").on('hidden.bs.modal', e => {
    document.getElementById('emp_no_master').value = '';
    document.getElementById('full_name_master').value = '';
    document.getElementById('dept_master').value = '';
    document.getElementById('group_master').value = '';
    document.getElementById('section_master').value = '';
    document.getElementById('sub_section_master').value = '';
    document.getElementById('line_no_master').value = '';
    document.getElementById('position_master').value = '';
    document.getElementById('process_master').value = '';
    document.getElementById('date_hired_master').value = '';
    document.getElementById('provider_master').value = '';
    document.getElementById('address_master').value = '';
    document.getElementById('contact_no_master').value = '';
    document.getElementById('emp_status_master').value = '';
    document.getElementById('shuttle_route_master').value = '';
    document.getElementById("emp_js_s_master").value = '';
    document.getElementById("emp_sv_master").value = '';
    document.getElementById("emp_approver_master").value = '';
    document.getElementById('gender_master').value = '';
    document.getElementById('shift_group_master').value = '';
});

const register_employees =()=>{
    var emp_no = document.getElementById('emp_no_master').value;
    var full_name = document.getElementById('full_name_master').value;
    var dept = document.getElementById('dept_master').value;
    var section = document.getElementById('section_master').value;
    var line_no = document.getElementById('line_no_master').value;
    var position = document.getElementById('position_master').value;
    var date_hired = document.getElementById('date_hired_master').value;
    var provider = document.getElementById('provider_master').value;
    var address = document.getElementById('address_master').value;
    var contact_no = document.getElementById('contact_no_master').value;
    var emp_status = document.getElementById('emp_status_master').value;
    var shuttle_route = document.getElementById('shuttle_route_master').value;
    var gender = document.getElementById('gender_master').value;
    var shift_group = document.getElementById('shift_group_master').value;
    var line_process = document.getElementById('process_master').value;
    // var group = document.getElementById('group_master').value;
    // var sub_section = document.getElementById('sub_section_master').value;

    var emp_js_s_master = document.getElementById("emp_js_s_master");
    var emp_js_s_no = emp_js_s_master.value;
    if (emp_js_s_no != '') {
        var emp_js_s = emp_js_s_master.options[emp_js_s_master.selectedIndex].text;
    } else {
        var emp_js_s = '';
    }

    var emp_sv_master = document.getElementById("emp_sv_master");
    var emp_sv_no = emp_sv_master.value;
    if (emp_sv_no != '') {
        var emp_sv = emp_sv_master.options[emp_sv_master.selectedIndex].text;
    } else {
        var emp_sv = '';
    }

    var emp_approver_master = document.getElementById("emp_approver_master");
    var emp_approver_no = emp_approver_master.value;
    if (emp_approver_no != '') {
        var emp_approver = emp_approver_master.options[emp_approver_master.selectedIndex].text;
    } else {
        var emp_approver = '';
    }
    
    if (emp_js_s_no == '') {
        emp_js_s = '';
    }
    if (emp_sv_no == '') {
        emp_sv = '';
    }
    if (emp_approver_no == '') {
        emp_approver = '';
    }

    if (emp_no == '') {
        Swal.fire({
            icon: 'info',
            title: 'Please Input Employee No !!!',
            text: 'Information',
            showConfirmButton: false,
            timer : 1000
        }); 
    }else if(full_name == ''){
        Swal.fire({
            icon: 'info',
            title: 'Please Input Full Name !!!',
            text: 'Information',
            showConfirmButton: false,
            timer : 1000
        }); 
    }else if(gender == ''){
        Swal.fire({
            icon: 'info',
            title: 'Please Set Gender !!!',
            text: 'Information',
            showConfirmButton: false,
            timer : 1000
        }); 
    }else if(dept == ''){
        Swal.fire({
            icon: 'info',
            title: 'Please Input Department !!!',
            text: 'Information',
            showConfirmButton: false,
            timer : 1000
        });    
    }else if(position == ''){
        Swal.fire({
            icon: 'info',
            title: 'Please Select Position !!!',
            text: 'Information',
            showConfirmButton: false,
            timer : 1000
        });  
    }else if(line_process == ''){
        Swal.fire({
            icon: 'info',
            title: 'Please Select Process !!!',
            text: 'Information',
            showConfirmButton: false,
            timer : 1000
        });  
    }else if(date_hired == ''){
        Swal.fire({
            icon: 'info',
            title: 'Please Input Date Hired !!!',
            text: 'Information',
            showConfirmButton: false,
            timer : 1000
        });  
    }else if(provider == ''){
        Swal.fire({
            icon: 'info',
            title: 'Please Select Provider !!!',
            text: 'Information',
            showConfirmButton: false,
            timer : 1000
        });  
    }else if(shift_group == ''){
        Swal.fire({
            icon: 'info',
            title: 'Please Select Shift Group !!!',
            text: 'Information',
            showConfirmButton: false,
            timer : 1000
        });  
    }else if(shuttle_route == ''){
        Swal.fire({
            icon: 'info',
            title: 'Please Select Shuttle Route !!!',
            text: 'Information',
            showConfirmButton: false,
            timer : 1000
        });  
    }else if(address == ''){
        Swal.fire({
            icon: 'info',
            title: 'Please Input Address !!!',
            text: 'Information',
            showConfirmButton: false,
            timer : 1000
        });  
    }else if(contact_no == ''){
        Swal.fire({
            icon: 'info',
            title: 'Please Input Contact No. !!!',
            text: 'Information',
            showConfirmButton: false,
            timer : 1000
        });  
    }else if(emp_status == ''){
        Swal.fire({
            icon: 'info',
            title: 'Please Select Employment Status !!!',
            text: 'Information',
            showConfirmButton: false,
            timer : 1000
        });  
    }else{
        $.ajax({
            url:'../process/hr/employees/emp-masterlist_p.php',
            type:'POST',
            cache:false,
            data:{
                method:'register_employee',
                emp_no:emp_no,
                full_name:full_name,
                dept:dept,
                section:section,
                line_no:line_no,
                line_process:line_process,
                position:position,
                date_hired:date_hired,
                provider:provider,
                shift_group:shift_group,
                address:address,
                contact_no:contact_no,
                emp_status:emp_status,
                shuttle_route:shuttle_route,
                gender:gender,
                emp_js_s_no:emp_js_s_no,
                emp_sv_no:emp_sv_no,
                emp_approver_no:emp_approver_no,
                emp_js_s:emp_js_s,
                emp_sv:emp_sv,
                emp_approver:emp_approver
            },success:function(response){
                if (response == 'success') {
                    Swal.fire({
                      icon: 'success',
                      title: 'Succesfully Recorded!!!',
                      text: 'Success',
                      showConfirmButton: false,
                      timer : 1000
                    });
                    $('#emp_no_master').val('');
                    $('#full_name_master').val('');
                    $('#dept_master').val('');
                    $('#group_master').val('');
                    $('#section_master').val('');
                    $('#sub_section_master').val('');
                    $('#line_no_master').val('');
                    $('#position_master').val('');
                    $('#process_master').val('');
                    $('#date_hired_master').val('');
                    $('#provider_master').val('');
                    $('#shift_group_master').val('');
                    $('#address_master').val('');
                    $('#contact_no_master').val('');
                    $('#emp_status_master').val('');
                    $('#shuttle_route_master').val('');
                    $('#gender_master').val('').trigger('change');
                    $('#emp_js_s_master').val('').trigger('change');
                    $('#emp_sv_master').val('').trigger('change');
                    $('#emp_approver_master').val('').trigger('change');
                    fetch_employee_name_approver_dropdown();
                    load_employees(1);
                    $('#new_employee').modal('hide');
                }else if(response == 'Already Exist'){
                     Swal.fire({
                      icon: 'info',
                      title: 'Duplicate Data !!!',
                      text: 'Information',
                      showConfirmButton: false,
                      timer : 1000
                    });
                }else{
                    Swal.fire({
                      icon: 'error',
                      title: 'Error !!!',
                      text: 'Error',
                      showConfirmButton: false,
                      timer : 1000
                    });
                }
            }
        });
    }
}

const get_employees_details =(param)=>{
    var string = param.split('~!~');
    var id = string[0];
    var emp_no = string[1];
    var full_name = string[2];
    var dept = string[3];
    var section = string[4];
    var line_no = string[5];
    var position = string[6];
    var provider = string[7];
    var date_hired = string[8];
    var address = string[9];
    var contact_no = string[10];
    var emp_status = string[11];
    var shuttle_route = string[12];
    var emp_js_s_no = string[13];
    var emp_sv_no = string[14];
    var emp_approver_no = string[15];
    var resigned = string[16];
    var resigned_date = string[17];
    var gender = string[18];
    var shift_group = string[19];
    var line_process = string[20];
    // var group = string[21];
    // var sub_section = string[22];

    document.getElementById('id_employee_master_update').value = id;
    document.getElementById('emp_no_master_update').value = emp_no;
    document.getElementById('full_name_master_update').value = full_name;
    document.getElementById('dept_master_update').value = dept;

    document.getElementById('section_master_update').value = section;
    document.getElementById('position_master_update').value = position;
    document.getElementById('provider_master_update').value = provider;
    document.getElementById('date_hired_master_update').value = date_hired;
    document.getElementById('address_master_update').value = address;
    document.getElementById('contact_no_master_update').value = contact_no;
    document.getElementById('emp_status_master_update').value = emp_status;
    document.getElementById('shuttle_route_master_update').value = shuttle_route;

    if (resigned == 0) {
        document.getElementById("resigned_master_update").checked = false;
    } else if (resigned == 1) {
        document.getElementById("resigned_master_update").checked = true;
    }

    document.getElementById('resigned_date_master_update').value = resigned_date;
    document.getElementById('gender_master_update').value = gender;
    document.getElementById('shift_group_master_update').value = shift_group;
    document.getElementById('shuttle_route_master_update').value = shuttle_route;
    // document.getElementById('group_master_update').value = group;
    // document.getElementById('sub_section_master_update').value = sub_section;

    fetch_line_dropdown_details();

    setTimeout(() => {
        document.getElementById('line_no_master_update').value = line_no;
        get_laf_approver_dropdowns(2);
        document.getElementById('emp_js_s_master_update').value = emp_js_s_no;
        document.getElementById('emp_sv_master_update').value = emp_sv_no;
        document.getElementById('emp_approver_master_update').value = emp_approver_no;
    }, 500);
}

const update_employee =()=>{
    var id = document.getElementById('id_employee_master_update').value;
    var emp_no = document.getElementById('emp_no_master_update').value;
    var full_name = document.getElementById('full_name_master_update').value;
    var dept = document.getElementById('dept_master_update').value;
    var section = document.getElementById('section_master_update').value;
    var line_no = document.getElementById('line_no_master_update').value;
    var position = document.getElementById('position_master_update').value;
    var date_hired = document.getElementById('date_hired_master_update').value;
    var provider = document.getElementById('provider_master_update').value;
    var address = document.getElementById('address_master_update').value;
    var contact_no = document.getElementById('contact_no_master_update').value;
    var emp_status = document.getElementById('emp_status_master_update').value;
    var shuttle_route = document.getElementById('shuttle_route_master_update').value;
    var gender = document.getElementById('gender_master_update').value;
    var shift_group = document.getElementById('shift_group_master_update').value;
    var line_process = document.getElementById('process_master_update').value;
    // var group = document.getElementById('group_master_update').value;
    // var sub_section = document.getElementById('sub_section_master_update').value;

    var emp_js_s_master_update = document.getElementById("emp_js_s_master_update");
    var emp_js_s_no = emp_js_s_master_update.value;
    if (emp_js_s_no != '') {
        var emp_js_s = emp_js_s_master_update.options[emp_js_s_master_update.selectedIndex].text;
    } else {
        var emp_js_s = '';
    }

    var emp_sv_master_update = document.getElementById("emp_sv_master_update");
    var emp_sv_no = emp_sv_master_update.value;
    if (emp_sv_no != '') {
        var emp_sv = emp_sv_master_update.options[emp_sv_master_update.selectedIndex].text;
    } else {
        var emp_sv = '';
    }

    var emp_approver_master_update = document.getElementById("emp_approver_master_update");
    var emp_approver_no = emp_approver_master_update.value;
    if (emp_approver_no != '') {
        var emp_approver = emp_approver_master_update.options[emp_approver_master_update.selectedIndex].text;
    } else {
        var emp_approver = '';
    }

    if (emp_js_s_no == '') {
        emp_js_s = '';
    }
    if (emp_sv_no == '') {
        emp_sv = '';
    }
    if (emp_approver_no == '') {
        emp_approver = '';
    }

    var resigned = 0;
    if (document.getElementById('resigned_master_update').checked == true) {
        resigned = 1;
    }

    var resigned_date = document.getElementById('resigned_date_master_update').value;

    if ((resigned == 1 && resigned_date == '') || (resigned == 0 && resigned_date != '')) {
        Swal.fire({
            icon: 'info',
            title: 'Please Complete Fill out of Resign Information !!!',
            text: 'Information',
            showConfirmButton: false,
            timer : 1000
        });
    } else {
        $.ajax({
            url:'../process/hr/employees/emp-masterlist_p.php',
            type:'POST',
            cache:false,
            data:{
                method:'update_employee',
                id:id,
                emp_no:emp_no,
                full_name:full_name,
                dept:dept,
                section:section,
                line_no:line_no,
                line_process:line_process,
                position:position,
                date_hired:date_hired,
                provider:provider,
                shift_group:shift_group,
                address:address,
                contact_no:contact_no,
                emp_status:emp_status,
                shuttle_route:shuttle_route,
                gender:gender,
                emp_js_s_no:emp_js_s_no,
                emp_sv_no:emp_sv_no,
                emp_approver_no:emp_approver_no,
                emp_js_s:emp_js_s,
                emp_sv:emp_sv,
                emp_approver:emp_approver,
                resigned:resigned,
                resigned_date:resigned_date
            },success:function(response){
                if (response == 'success') {
                    Swal.fire({
                      icon: 'success',
                      title: 'Succesfully Recorded!!!',
                      text: 'Success',
                      showConfirmButton: false,
                      timer : 1000
                    });
                    $('#id_employee_master_update').val('');
                    $('#emp_no_master_update').val('');
                    $('#full_name_master_update').val('');
                    $('#dept_master_update').val('');
                    $('#group_master_update').val('');
                    $('#section_master_update').val('');
                    $('#sub_section_master_update').val('');
                    $('#line_no_master_update').val('');
                    $('#position_master_update').val('');
                    $('#process_master_update').val('');
                    $('#date_hired_master_update').val('');
                    $('#provider_master_update').val('');
                    $('#shift_group_master_update').val('');
                    $('#address_master_update').val('');
                    $('#contact_no_master_update').val('');
                    $('#emp_status_master_update').val('');
                    $('#shuttle_route_master_update').val('');
                    $('#gender_master_update').val('').trigger('change');
                    $('#emp_js_s_master_update').val('').trigger('change');
                    $('#emp_sv_master_update').val('').trigger('change');
                    $('#emp_approver_master_update').val('').trigger('change');
                    load_employees(1);
                    $('#update_employee').modal('hide');
                }else if(response == 'duplicate'){
                     Swal.fire({
                      icon: 'info',
                      title: 'Duplicate Data !!!',
                      text: 'Information',
                      showConfirmButton: false,
                      timer : 1000
                    });
                }else{
                    Swal.fire({
                      icon: 'error',
                      title: 'Error !!!',
                      text: 'Error',
                      showConfirmButton: false,
                      timer : 1000
                    });
                }
            }
        });
    }
}

const delete_employee =()=>{
    var id = document.getElementById('id_employee_master_update').value;
    $.ajax({
        url:'../process/hr/employees/emp-masterlist_p.php',
        type:'POST',
        cache:false,
        data:{
            method:'delete_employee',
            id:id
        },success:function(response){
            if (response == 'success') {
                Swal.fire({
                  icon: 'info',
                  title: 'Succesfully Deleted !!!',
                  text: 'Information',
                  showConfirmButton: false,
                  timer : 1000
                });
                load_employees(1);
                $('#update_employee').modal('hide');
            }else{
                Swal.fire({
                  icon: 'error',
                  title: 'Error !!!',
                  text: 'Error',
                  showConfirmButton: false,
                  timer : 1000
                }); 
            }
        }
    });
}

const print_employees = () => {
    var emp_no = sessionStorage.getItem('emp_no_master_search');
    var full_name = sessionStorage.getItem('full_name_master_search');
    var provider = sessionStorage.getItem('provider_master_search');
    var dept = sessionStorage.getItem('dept_master_search');
    var section = sessionStorage.getItem('section_master_search');
    var line_no = sessionStorage.getItem('line_no_master_search');
    var date_updated_from = sessionStorage.getItem('date_updated_from_master_search');
    var date_updated_to = sessionStorage.getItem('date_updated_to_master_search');
    var resigned = sessionStorage.getItem('resigned_master_search');
    window.open('../process/print/print_employees_hr.php?emp_no='+emp_no+"&full_name="+full_name+'&provider='+provider+'&dept='+dept+'&section='+section+'&line_no='+line_no+'&date_updated_from='+date_updated_from+'&date_updated_to='+date_updated_to+'&resigned='+resigned,'_blank');
}

// uncheck all
const uncheck_all = () => {
    var select_all = document.getElementById('check_all');
    select_all.checked = false;
    document.querySelectorAll(".singleCheck").forEach((el, i) => {
        el.checked = false;
    });
    get_checked_length();
}
// check all
const select_all_func = () => {
    var select_all = document.getElementById('check_all');
    if (select_all.checked == true) {
        console.log('check');
        document.querySelectorAll(".singleCheck").forEach((el, i) => {
            el.checked = true;
        });
    } else {
        console.log('uncheck');
        document.querySelectorAll(".singleCheck").forEach((el, i) => {
            el.checked = false;
        });
    }
    get_checked_length();
}
// GET THE LENGTH OF CHECKED CHECKBOXES
const get_checked_length = () => {
    var arr = [];
        document.querySelectorAll("input.singleCheck[type='checkbox']:checked").forEach((el, i) => {
        arr.push(el.value);
    });
    console.log(arr);
    var numberOfChecked = arr.length;
    console.log(numberOfChecked);
    if (numberOfChecked > 0) {
        document.getElementById("btnPrintSelectedQr").removeAttribute('disabled');
    } else {
        document.getElementById("btnPrintSelectedQr").setAttribute('disabled', true);
    }
}

const export_employees = () => {
    var emp_no = sessionStorage.getItem('emp_no_master_search');
    var full_name = sessionStorage.getItem('full_name_master_search');
    var provider = sessionStorage.getItem('provider_master_search');
    var dept = sessionStorage.getItem('dept_master_search');
    var section = sessionStorage.getItem('section_master_search');
    var line_no = sessionStorage.getItem('line_no_master_search');
    var date_updated_from = sessionStorage.getItem('date_updated_from_master_search');
    var date_updated_to = sessionStorage.getItem('date_updated_to_master_search');
    var resigned = sessionStorage.getItem('resigned_master_search');
    window.open('../process/export/exp_employees_hr.php?emp_no='+emp_no+"&full_name="+full_name+'&provider='+provider+'&dept='+dept+'&section='+section+'&line_no='+line_no+'&date_updated_from='+date_updated_from+'&date_updated_to='+date_updated_to+'&resigned='+resigned,'_blank');
}

const print_employees_qr = () => {
    var id = document.getElementById('id_employee_master_update').value;
    window.open('../process/print/print_employees_qr.php?id='+id,'_blank');
}

const print_employees_selected_qr = () => {
    var arr = [];
    document.querySelectorAll("input.singleCheck[type='checkbox']:checked").forEach((el, i) => {
        arr.push(el.value);
    });
    console.log(arr);
    var numberOfChecked = arr.length;
    if (numberOfChecked > 0) {
        id_arr = Object.values(arr);
        window.open('../process/print/print_employees_selected_qr.php?id_arr='+id_arr,'_blank');
    } else {
        Swal.fire({
            icon: 'info',
            title: 'No Row Selected',
            text: 'Information',
            showConfirmButton: false,
            timer : 1000
        });
    }
}

const print_employees_qr_all = () => {
    var emp_no = sessionStorage.getItem('emp_no_master_search');
    var full_name = sessionStorage.getItem('full_name_master_search');
    var provider = sessionStorage.getItem('provider_master_search');
    var dept = sessionStorage.getItem('dept_master_search');
    var section = sessionStorage.getItem('section_master_search');
    var line_no = sessionStorage.getItem('line_no_master_search');
    var date_updated_from = sessionStorage.getItem('date_updated_from_master_search');
    var date_updated_to = sessionStorage.getItem('date_updated_to_master_search');
    var resigned = sessionStorage.getItem('resigned_master_search');
    window.open('../process/print/print_employees_qr_all.php?emp_no='+emp_no+"&full_name="+full_name+'&provider='+provider+'&dept='+dept+'&section='+section+'&line_no='+line_no+'&date_updated_from='+date_updated_from+'&date_updated_to='+date_updated_to+'&resigned='+resigned,'_blank');
}

const upload_csv = () => {
    var file_form = document.getElementById('file_form');
    var form_data = new FormData(file_form);
    $.ajax({
        url: '../process/import/imp_employees.php',
        type: 'POST',
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        beforeSend: (jqXHR, settings) => {
            Swal.fire({
                icon: 'info',
                title: 'Uploading Please Wait...',
                text: 'Info',
                showConfirmButton: false,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false
            });
            jqXHR.url = settings.url;
            jqXHR.type = settings.type;
        }, 
        success: response => {
            setTimeout(() => {
                swal.close();
                if (response != '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Upload CSV Error',
                        text: `Error: ${response}`,
                        showConfirmButton: false,
                        timer : 2000
                    });
                } else {
                    Swal.fire({
                        icon: 'info',
                        title: 'Upload CSV',
                        text: 'Uploaded and updated successfully',
                        showConfirmButton: false,
                        timer : 1000
                    });
                    load_employees(1);
                }
                document.getElementById("file").value = '';
            }, 500);
        }
    })
    .fail((jqXHR, textStatus, errorThrown) => {
        console.log(jqXHR);
        swal('System Error', `Call IT Personnel Immediately!!! They will fix it right away. Error: url: ${jqXHR.url}, method: ${jqXHR.type} ( HTTP ${jqXHR.status} - ${jqXHR.statusText} ) Press F12 to see Console Log for more info.`, 'error');
    });
}
</script>