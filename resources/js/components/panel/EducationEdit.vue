<template>
    <div>   
        <form  @submit.prevent="update">
             <div class="columns">
            <div class="column is-8 is-offset-2">
                 <div class="educ-wrapper" >
                <input type="hidden" v-model="fields.education_id"/>
                <div class="columns">
                    <div class="column i">
                        <!-- Level -->
                        <b-field label ="Level">
                            <b-select placeholder="Level" v-model ="fields.level">
                                
                                <option value="TERTIARY">TERTIARY</option>
                                <option value="POST GRADUATE">POST GRADUATE</option>
                                <option value="VOCATIONAL">VOCATIONAL</option>
                            </b-select>
                        </b-field>
                    </div> <!--close column-->
                </div> <!--close columns-->
                <div class="columns">
                        <!-- Name of School -->
                    <div class="column">
                        <b-field label="Name of School">
                            <b-input placeholder="Name of School" v-model="fields.school_name"></b-input>
                        </b-field>
                    </div> <!--close column-->

                    <!-- Remark -->
                    <div class="column">
                        <b-field label="Remark">
                            <b-input placeholder="Remark" v-model="fields.remark"></b-input>
                        </b-field>
                    </div> <!--close column-->
                </div>
                <div class="columns">
                    <!-- Unit -->
                    <div class="column">
                        <b-field label="Units">
                            <b-numberinput placeholder="Units" v-model="fields.unit"></b-numberinput>
                        </b-field>
                    </div> <!--close column-->


                    <!-- Year Graduated -->
                    <div class="column">
                        <b-field label="Year Graduated">
                            <b-input placeholder="Year Graduated" v-model="fields.year_graduated"></b-input>
                        </b-field>
                    </div> <!--close column-->


                </div> <!--close columns-->
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
    props: ['educations'],

    data(){
        return{
            fields: {}
        }
    },


    methods: {
        initializeData(){
            this.fields = JSON.parse(this.educations);
            
        },

         update(){
            axios.put('/panel/education-page/'+this.fields.education_id, this.fields).then(res=>{
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