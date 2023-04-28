<template>
    <div>   
        <form  @submit.prevent="update">
             <div class="columns">
            <div class="column is-8 is-offset-2">
                 <div class="educ-wrapper" >
                <input type="hidden" v-model="fields.eligibility_id"/>
                      <!-- Type of Eligibility -->
                        <div class="column">
                            <b-field label="Eligibility">
                                <b-input placeholder="Eligibility" v-model="fields.eligible"></b-input>
                            </b-field>
                        </div> <!--close column-->

                        <!-- Date Acquired -->
                        <div class="column">
                            <b-field label="Eligible since (year)">
                                <b-input placeholder="Eligible since (year)" v-model="fields.date_acquired"></b-input>
                            </b-field>
                        </div> <!--close column-->

                        <!-- Rating -->
                        <div class="column">
                            <b-field label="Rating">
                                <b-input placeholder="Rating" v-model="fields.rating"></b-input>
                            </b-field>
                        </div> <!--close column-->

                            <!-- License ID -->
                        <div class="column">
                            <b-field label="License Number">
                                <b-input placeholder="License Number" v-model="fields.license_id"></b-input>
                            </b-field>
                        </div> <!--close column-->
                         <div class="buttons mt-3">
                            <button class="button is-small is-success is-outlined" >UPDATE</button>
                   
                         </div>
            </div> <!--close educ wrapper-->
            </div>
        </div>
        </form>
       
           
    </div>
</template>
<script>
export default {
    props: ['eligibilities'],

    data(){
        return{
            fields: {}
        }
    },


    methods: {
        initializeData(){
            this.fields = JSON.parse(this.eligibilities);
            
        },

         update(){
            axios.put('/panel/eligibility-page/'+this.fields.eligibility_id, this.fields).then(res=>{
                if(res.data.status === 'updated')
                this.$buefy.dialog.alert({
                    title: 'UPDATED!',
                    message: 'Your profile successfully updated.',
                    type: 'is-success',
                    onConfirm: ()=> window.location='/panel/user-page'
                });
            })

      }
    }, //end method

    mounted(){
        this.initializeData();
    },
}
</script>

<style scoped>
 .educ-wrapper{
        padding:20px;
        background-color: rgb(243, 243, 243);
        border-radius: 5px;
        margin-top: 5px;

    }

</style>