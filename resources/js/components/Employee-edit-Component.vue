<template>
    <div class="container">
        <div class="row ">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Employee Information </div>

                    <div class="card-body">

                        <form >
          
        <div class="form-group">


      <div v-if=" customer.status == 1 ">
  <h4>Status: <span class="badge badge-success">Active </span></h4>
</div>
<div v-else>
  <h4>Status:<span class="badge badge-warning">Inactive </span></h4>
</div>
          
         
        </div>

        <div class="form-group">


          <label> Name</label>
          <input type="text" class="form-control" v-model="customer.name" placeholder="Enter your name" required>
         
        </div>




        <div class="form-group">


          <label> Email-Address</label>
          <input type="email" class="form-control" v-model="customer.email" placeholder="Enter your email" required>
         
        </div><div class="form-group">


          <label>Cell no</label>
          <input type="phone-no" class="form-control" v-model="customer.phone" placeholder="Enter your Phone no " required>
         
        </div>

        
        
          <button type="submit" class="btn btn-info btn-block" @click.prevent="employeeDataupdate()">Update</button>
          
        
        
        
      </form>
                     
                    </div>
                </div>




            </div>

<div class="col-md-5">
               




            </div>




        </div>
    </div>
</template>

<script>
    export default {
      mounted() {
          console.log('Component mounted.')
          
           
        },
      props:['customer','info'],

      data(){
        return{
          posts:{},
          name:'',
          phone:'',
          email:'',
          project:'',
         


        }


      },
        

        methods: {



  employeeDataupdate(){
            
            axios.post('/employee_update/'+this.customer.id, {
                    name: this.customer.name,
                    phone: this.customer.phone,
                    email: this.customer.email,
  })
  .then(function (response) {
    alert('Information is updated');
    console.log(response,'then');
    //location.reload();
    
  })
  .catch(function (error) {
    console.log(error,'error');
  });


          },


      
        }


}
</script>


