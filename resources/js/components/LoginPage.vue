<template>
    <div>
        <div class="hero is-fullheight">
            <div class="hero-body">
                <div class="container">
                     <div class="columns">
                        <div class="column is-4 is-offset-4">
                            <div class="panel">
                                <div class="panel-heading">
                                    GADTC ALUMNI TRACER
                                </div>
                                <div class="panel-body">
                                    <form @submit.prevent="submit">
                                    <b-field label="Username">
                                        <b-input type="text" v-model="fields.username" name="username" placeholder="Username"/>
                                    </b-field>

                                    <b-field label="Password">
                                        <b-input type="password" v-model="fields.password" name="password" placeholder="Password"/>
                                    </b-field>

                                    <div class="mb-3">
                                            <p style="color:red; font-weight:bold;" v-for="(error, index) in this.errors" :key="index"> {{ error[0] }} </p>
                                    </div>
                                    <button class="button is-primary">LOGIN</button>
                                   

                                    <!-- <div>
                                         <a href="/registration-page">Register Here</a>
                                     </div> -->
                                    </form>
                                </div>
                            </div> <!--close panel div-->
                        </div>
                    </div>
                </div>
            </div>
        </div> <!--close-->
                
           
        
       
        
       
    </div>
</template>

<script>


export default {
    //for variable declaration
    data(){
        return{
            fields: {},
            errors: {},
        }
    },
    methods: {
        submit(){
            axios.post('/login', this.fields).then(res=>{
            if(res.status === 204){
            window.location ='/login';
             }
             
         }).catch(err=>{
             if(err.response.status === 422){
               this.errors = err.response.data.errors;
             }
         })
        }
        

    }
}


    
</script>
<style scope>
.panel-body{
padding:15px;
}

</style>
