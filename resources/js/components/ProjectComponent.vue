<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">

              

                <div class="card">
                    <div class="card-header text-center"> Project Add </div>

                    <div class="card-body">

                        <form >
          
        <div class="form-group">


          <label>  Project Name</label>
          <input type="text" class="form-control" v-model="name" placeholder="Enter your name" required>
         
        </div>
        <div class="form-group">


          <label> Clint</label>
          <input type="text" class="form-control" v-model="clint" placeholder="Enter your Phone no" required>
         
        </div>
        



       <div class="form-group">
       
       
         <label>Department</label>
       
         <select v-model="department_id" class="form-control">
           <option value="">Select Department</option>
       
          <option v-for="(department,index) in dept" v-bind:value=" department.id "> {{ department.name }}</option>
       </select>

     <!--  <span>Selected: {{ department_id }}</span> -->
        
        
       </div>


        
        
          <button type="submit" class="btn btn-success btn-block" @click.prevent="employeeDatasave()">Submit</button>
          
        
        
        
      </form>
                     
                    </div>
                </div>


<br>


            </div>





<div class="col-md-6 ">
  
 <div class="card">
                    <div class="card-header bg-info">Project List</div>

                    <div class="card-body">

                <table class="table table-striped">

    <thead>
      <tr>
        <th>NO</th>
        
        <th>ProjectName</th>
        
        <th>clint</th>
        <th>Department</th>
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>



      <tr v-for="(projects,index) in project">

        <td> {{ index+1 }}</td>

        <td> {{ projects.name }}</td>
        
        <td> {{ projects.clint }}</td>
         <td> 
      
      
        <div  v-for="(department,index) in dept"  v-if="projects.department_id  == department.id ">
      
        {{ department.name }}
      </div>
      
      
      
      
      </td>
      <td>
        
        <a :href="'project_edit/'+projects.id" class="btn btn-info btn-sm">Edit</a>
        <a :href="'project_delete/'+projects.id" class="btn btn-danger btn-sm">Delete</a>
      </td>


        

      </tr>


      

     
    </tbody>
  </table>
                     
                    </div>
                </div>

</div>  

<div class="col-md-4">

              

                <div class="card">
                    <div class="card-header text-center"> Assign superviser  </div>

                    <div class="card-body">

                        <form >
          
       
        

  

       <div class="form-group">
       
       
         <label>Employee</label>
       
         <select v-model="employee_id" class="form-control">

          <option value="">Select Employee</option>
       
          <option v-for="(employee,index) in posts" v-bind:value=" employee.id "> {{ employee.name }}</option>
       </select>

     <span>Selected: {{ employee_id }}</span>
        
        
       </div>  
       <div class="form-group">
       
       
         <label>Project</label>
       
         <select v-model="projects_id" class="form-control">

           <option value="">Select project</option>
       
          <option v-for="(projects,index) in project" v-bind:value=" projects.id "> {{ projects.name }}</option>
       </select>

     <span>Selected: {{ projects_id }}</span>
        
        
       </div>


        
        
          <button type="submit" class="btn btn-block btn-success" @click.prevent="superviserDatasave()">Submit</button>
          
        
        
        
      </form>
                     
                    </div>
                </div>


<br>


            </div>

<div class="col-md-6 ">
  
 <div class="card">
                    <div class="card-header bg-info">supervisor List</div>

                    <div class="card-body">

                <table class="table table-striped">

    <thead>
      <tr>
        <th>NO</th>
        
        <th>Employee Name</th>
        
        <th>Project Name</th>
       
        
      </tr>
    </thead>
    <tbody>
      <tr  v-for="(supervisors,index) in supervisor " >  
        <td>{{ index+1 }}</td>

        <td>


            <div  v-for="(employee,index) in posts"  v-if="supervisors.employee_id  === employee.id ">
      
                {{ employee.name }}
              </div>

<div v-if=" ">
none
</div>



        








      </td>
      <td>
        



      <div  v-for="(projects,index) in project"  v-if="supervisors.project_id  == projects.id ">
      
        {{ projects.name }}
              </div>

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
          clint:'',
          employee_id:'',
          projects_id:'',
          supervisor:'',
          
          department_id:'',
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
            axios.post('/project_add', {
    name: this.name,
    clint: this.clint,
    
    department_id: this.department_id
  })
  .then(function (response) {
    alert('project is added');
    console.log(response,'then');
    location.reload();
  })
  .catch(function (error) {
    console.log(error,'error');
  });


          },

           superviserDatasave(){
            console.log('click data send');
            axios.post('/superviser_add', {
    employee_id: this.employee_id,
    projects_id: this.projects_id,
    
  })
  .then(function (response) {
    alert('superviser is added');
    console.log(response,'then');
    location.reload();
  })
  .catch(function (error) {
    console.log(error,'error');
  });


          },












           projectDatadelete(){
            
            axios.get('/project_delete/'+this.projects.id, {
                  })
  .then(function (response) {
   alert('project is added');
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

  axios.get('/supervisor_show')
            .then(response => {
              this.supervisor = response.data;
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


