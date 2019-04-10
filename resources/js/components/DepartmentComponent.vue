<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              

                <div class="card">
                    <div class="card-header">Department </div>

                    <div class="card-body">

                        <form >
          
        <div class="form-group">


          <label> Name</label>
          <input type="text" class="form-control" v-model="name" placeholder="Enter your name" required>
         
        </div>


        
        
          <button type="submit" class="btn btn-success btn-block" @click.prevent="employeeDatasave()">Submit</button>
          
        
        
        
      </form>
                     
                    </div>
                </div>


<br>


            </div>
<div class="col-md-12">
  
 <div class="card">
                    <div class="card-header bg-info">Department List</div>

                    <div class="card-body">

                <table class="table table-striped">
    <thead>
      <tr>
        <th>NO</th>
        <th>Name</th>
        <th>Action</th>
      
      </tr>
    </thead>
    <tbody>
      <tr v-for="(post,index) in posts">
        <td>{{ index+1}}</td>
        <td>{{ post.name}}</td>
       
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
          posts:{},
          name:''
         


        }


      },
        mounted() {
            console.log('Component mounted.');
            this.getData();
          
           
        },

        methods: {

          employeeDatasave(){
            console.log('click data send');
            axios.post('/department_add', {
    name: this.name,
   
  })
  .then(function (response) {
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

            axios.get('/department_show')
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
 }

        }


}
</script>


