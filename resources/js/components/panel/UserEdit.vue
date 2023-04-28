<template>
    <div>
        <div class="hero">
            <div class="hero-body">
                <div class="container">
                    <div class="columns">
                        <div class="column is-8 is-offset-2">

                            <form @submit.prevent="updateData">

                                <div class="panel">
                                    <div class="panel-heading">
                                        ACCOUNT INFORMATION
                                    </div> <!--close panel-heading-->
                                <div class="panel-body">
                                    <div class="container has-text-centered mb-2">
                                        <div>
                                            <img v-if="this.fields.profile_image" :src="'/'+ this.fields.profile_image" @click="openModal" alt="..." class="img-wrapper"/>
                                        </div>

                                        <b-field class="file is-centered" :class="{'has-name' : !fields.avatar}">
                                            <b-upload v-model="fields.avatar" class="file-label">
                                            <span class="file-cta">
                                                <b-icon class="file-icon" icon="upload"></b-icon>
                                                        <span class="file-label">Click to upload</span>
                                            </span>
                                                <span class="file-name" v-if="fields.avatar"> {{ fields.avatar.name }} </span>
                                            </b-upload>
                                        </b-field>
                                    </div>

                                    <!-- Name -->
                                    <div class="columns">
                                        <div class="column">
                                             <b-field label="First Name">
                                                <b-input type="text" placeholder="First Name"  v-model="fields.fname" required></b-input>
                                            </b-field>
                                        </div>
                                        <div class="column">
                                            <b-field label="Middle Name">
                                                <b-input type="text" placeholder="Middle Name" v-model="fields.mname"  ></b-input>
                                            </b-field>
                                        </div>
                                        <div class="column">
                                             <b-field label="Last Name">
                                                <b-input type="text" placeholder="Last Name" v-model="fields.lname" required></b-input>
                                            </b-field>
                                        </div>
                                        <div class="column">
                                             <b-field label="Suffix">
                                                <b-input type="text" placeholder="Suffix" v-model="fields.suffix"  ></b-input>
                                            </b-field>
                                        </div>
                                       

                                    </div>

                                    <div class="columns">
                                        <div class="column">
                                            <b-field label="Sex" expanded>
                                                <b-select placeholder="Sex"  v-model="fields.sex" required expanded>
                                                    <option value="MALE">MALE</option>
                                                    <option value="FEMALE">FEMALE</option>
                                                </b-select>
                                            </b-field>
                                        </div>

                                        <div class="column">
                                        <b-field label="Civil Status">
                                                <b-select placeholder="Civil Status"  v-model="fields.civil_status" required >
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                </b-select>
                                             </b-field>
                                        </div>

                                        <div class="column">
                                            <b-field label="Role" expanded>
                                                <b-select placeholder="Role"  v-model="fields.role" required expanded>
                                                    <option value="ALUMNI">ALUMNI</option>
                                                    <option value="ADMIN">ADMIN</option>
                                                </b-select>
                                            </b-field>
                                        </div>
                                    </div>
                                   <!-- Sex -->

                                    <!-- Contact -->
                                    <div class="columns">
                                            <div class="column">
                                            <b-field label="E-mail">
                                            <b-input type="email" placeholder="E-mail"  v-model="fields.email" required></b-input>
                                        </b-field>
                                        </div>
                                        <div class="column">
                                            <b-field label="Contact Number">
                                            <b-input type="text" placeholder="Contact Number"  v-model="fields.contact_number" required></b-input>
                                        </b-field>
                                        </div>
                                         <div class="column">
                                            <b-field label="Facebook Account">
                                            <b-input type="text" placeholder="Facebook Account"  v-model="fields.fb_account" required></b-input>
                                        </b-field>
                                        </div>
                                    </div>

                                    <div class="columns">

                                        <div class="column">
                                        <b-field label="Membership Classification">
                                                <b-select placeholder="Membership Classification"  v-model="fields.alumni_classification" required >
                                                    <option value="Associate">Associate</option>
                                                    <option value="Honorary">Honorary</option>
                                                    <option value="Regular">Regular</option>
                                                </b-select>
                                             </b-field>
                                        </div>

                                        <div class="column">
                                            <b-field label="Programs" expanded>
                                                <b-select placeholder="Programs" v-model="fields.program" required expanded>
                                                    <option v-for="(program, index) in  programsJSON" :key="index" :value="program.program">{{ program.program }}</option>
                                                </b-select>
                                            </b-field>
                                        </div> <!-- close column -->

                                        <div class="column">
                                            <b-field label="Year Graduated" >
                                                <b-input type="text" v-model="fields.year_graduated" placeholder="Year Graduated" required></b-input>
                                            </b-field>
                                        </div>
                                    </div>

                                    <!-- BUTTON -->
                                   <div class="buttons is-right">
                                       <button class="button is-primary">SAVE</button>
                                   </div>
                                </div> <!--close panel body-->
                            </div> <!--close panel-->
                            </form>
                        </div> <!--close column-->
                    </div> <!--close columns-->
                </div> <!--close container-->
            </div> <!--close hero-body-->
        </div> <!--close hero-->

         <b-modal v-model="isModalView" has-modal-card
            trap-focus width="640" aria-role="dialog" aria-modal>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">View Photo</p>
                    <button type="button" class="delete"
                    @click="isModalView=false"/>

                </header>
                <section class="modal-card-body">
                    <div>
                         <img :src="'/' + fields.profile_image" alt="..." />
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <b-button
                        label="Close"
                        @click="isModalView=false"></b-button>
                </footer>
            </div>
        </b-modal>
    </div>
</template>

<script>
export default {
    props: ['user', 'dataPrograms'],

    data(){
        return{
            fields: {},
            errors: {},
            userJSON: null,
            programsJSON: null,

            isModalView: false,
        }

    },

    methods: {
        initializeData(){

            this.userJSON = JSON.parse(this.user);
            this. programsJSON = JSON.parse(this.dataPrograms);
            this.fields = this.userJSON;

        },
        openModal(){
            this.isModalView = true;

        },

        updateData(){
            const config = {
                headers:{
                    'Content-Type':'multipart/form-data',
                }
            };

            let formData = new FormData();
            formData.append('fname', this.fields.fname);
            formData.append('lname', this.fields.lname);
            formData.append('mname', this.fields.mname);
            formData.append('email', this.fields.email);
            formData.append('sex', this.fields.sex);
            formData.append('role', this.fields.role);
            formData.append('fb_account', this.fields.fb_account);
            formData.append('civil_status', this.fields.civil_status);
            formData.append('suffix', this.fields.suffix);
            formData.append('contact_number', this.fields.contact_number);
            formData.append('program', this.fields.program);
            formData.append('alumni_classification', this.fields.alumni_classification);
            formData.append('year_graduated', this.fields.year_graduated);
            formData.append('profile_image', this.fields.avatar);

            //console.log(formData);
            axios.post('/panel/user-page-post/'+this.userJSON.user_id, formData, config).then(res=>{
                if(res.data.status === 'updated')
                this.$buefy.dialog.alert({
                    title: 'UPDATED!',
                    message: 'Your profile successfully updated.',
                    type: 'is-success',
                    onConfirm: ()=> window.location='/panel/user-page'
                });
            }).catch(err=>{
                console.log(err.response);
            });


        }
    },//end method
    mounted(){
        this.initializeData();

    }
}
</script>

<style scoped>
 .img-wrapper{
        width:160px;
    }

</style>
