<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">

              

                <div class="card">
                    <div class="card-header"> Add Employee </div>

                    <div class="card-body">

                        <form  >
          
        <div class="form-group">


          <label> Name</label>
          <input type="text" class="form-control" v-model="name" placeholder="Enter your name" required>
         
        </div>
        <div class="form-group">


          <label> Cell No</label>
          <input type="number" class="form-control" v-model="phone" placeholder="Enter your Phone no" required>
         
        </div>
        <div class="form-group">


          <label>Email-Address</label>
          <input type="Email" class="form-control" v-model="email" placeholder="Enter your Email " required>
         
        </div> 



       <div class="form-group">
       
       
         <label>Department</label>
       
         <select v-model="dept_id" class="form-control">
           <option value="">Select Department</option>
       
          <option v-for="(department,index) in dept" v-bind:value=" department.id "> {{ department.name }}</option>
       </select>

      <!--  <span>Selected: {{ dept_id }}</span> -->
        
        
       </div>


        
        
          <button type="submit" class="btn btn-success btn-block" @click.prevent="employeeDatasave()">Submit</button>
          
        
        
        
      </form>
                     
                    </div>
                </div>


<br>


            </div>





<div class="col-md-8">
  
 <div class="card">
                    <div class="card-header bg-info">Employee List</div>

                    <div class="card-body">

                <table class="table table-striped">

    <thead>
      <tr>
        <th>NO</th>
        
        <th>Name</th>
        <th>status</th>
        <th>Email</th>
        <th>Phone</th>
      
        
        <th>Department </th>
        

       
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(post,index) in posts">
        <td>{{ index+1}}</td>
        <td>  {{ post.name}} </td>
        <td>
           <div  v-if=" post.status == 1 ">

           <span class="btn btn-sm btn-success">active</span>


 
          </div>
          <div  v-else=" post.status == 0 ">
            <span class="btn btn-sm btn-warning">inctive</span>


 
          </div>
         

      </td>
      <td>{{ post.email }}</td>
      <td>{{ post.phone }}</td>
     
       
       
<td> 


  <div  v-for="(department,index) in dept"  v-if=" post.dept_id == department.id ">

  {{ department.name }}
</div>




</td>






        <td>
        <a :href="'employee_edit/'+post.id" class="btn btn-info btn-sm">Edit</a>

        
        <a :href="'employee_delete/'+post.id" class="btn btn-danger btn-sm">Delete</a>
        </td>
      </tr>

     
    </tbody>
  </table>
                     
                    </div>
                </div>

</div>  
     



        </div>
    </div>
</template>

<script>
    export default {


      data(){
        return{
          dept:{},
          posts:{},
          name:'',
          phone:'',
          email:'',
          dept_id:'',
          selected: '',
          project:{},


        }


      },
        mounted() {
            console.log('Component mounted.');
            this.getData();
          
           
        },

        methods: {



          employeeDatasave(){
            console.log('click data send');
            axios.post('/employee_add', {
    name: this.name,
    phone: this.phone,
    email: this.email,
    dept_id: this.dept_id
  })
  .then(function (response) {
    alert('employee is added');
    console.log(response,'then');
    location.reload();
  })
  .catch(function (error) {
    console.log(error,'error');
  });


          },

           employeeDatadelete(){
            
            axios.get('/employee_update/'+this.customer.id, {
                  })
  .then(function (response) {
    console.log(response,'then');
    location.reload();
    
  })
  .catch(function (error) {
    console.log(error,'error');
  });


   },



          getData(){



            axios.get('/employee_show')
            .then(response => {
              this.posts =response.data;
            }).then(function (response) {
    // handle success
    console.log(response);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })
  .then(function () {
    // always executed
  });

  axios.get('/department_show')
            .then(response => {
              this.dept =response.data;
            }).then(function (response) {
    // handle success
    console.log(response);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })
  .then(function () {
    // always executed
  });

  axios.get('/project_show')
            .then(response => {
              this.project = response.data;
            }).then(function (response) {
    // handle success
    console.log(response);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })
  .then(function () {
    // always executed
  });




 },














 }


}
</script>


