<template>
    <div>
        <div class="hero">
            <div class="hero-body">
                <div class="container">
                    <div class="columns">
                        <div class="column is-8 is-offset-2">

                            <form @submit.prevent="update">

                                <div class="panel">
                                <div class="panel-heading">
                                    ADDRESS INFORMATION
                                </div> <!--close panel-heading-->
                                <div class="panel-body">
                                     <div class="title is-5">Home Address</div>
                                     <div class="columns">
                                         <div class="column">
                                                <!-- Country -->
                                                <b-field label="Country">
                                                    <b-input placeholder="Country" v-model="nAddresses.country_boarding"></b-input>
                                                </b-field>
                                            </div> <!--close column-->
                                            <div class="column">
                                                <b-field label="Province">
                                                    <b-input placeholder="Province" v-model="nAddresses.province_boarding"></b-input>
                                                </b-field>
                                            </div> <!--close column-->
                                        </div> <!--close columns-->
                                         <!--City-->
                                        <div class="columns">
                                            <div class="column">
                                                <b-field label="City/Municipality">
                                                    <b-input placeholder="City/Municipality" v-model="nAddresses.city_boarding"></b-input>
                                                </b-field>
                                            </div><!--close column-->
                                            <div class="column">
                                                <b-field label="District">
                                                    <b-input placeholder="District" v-model="nAddresses.district_boarding"></b-input>
                                                </b-field>
                                            </div><!--close column-->
                                        </div><!--close columns-->

                                          <!--Street-->
                                            <div class="columns">
                                            <div class="column">
                                                <b-field label="Brgy/Street">
                                                    <b-input placeholder="Brgy/Street" v-model="nAddresses.brgy_boarding"></b-input>
                                                </b-field>
                                            </div><!--close column-->
                                            <div class="column">
                                                <b-field label="Zipcode">
                                                    <b-input placeholder="Zipcode" v-model="nAddresses.zipcode_boarding"></b-input>
                                                </b-field>
                                            </div><!--close column-->
                                        </div><!--close columns-->
                                <hr>
                                        <!--Work Address-->
                                        <div class="title is-5">Work Address</div>
                                        <div class="columns">
                                            <div class="column">
                                                <!-- Country -->
                                                <b-field label="Country">
                                                    <b-input placeholder="Country" v-model="nAddresses.country_work"></b-input>
                                                </b-field>
                                            </div> <!--close column-->
                                            <div class="column">
                                                <b-field label="Province">
                                                    <b-input placeholder="Province" v-model="nAddresses.province_work"></b-input>
                                                </b-field>
                                            </div> <!--close column-->
                                        </div> <!--close columns-->

                                        <!--City-->
                                        <div class="columns">
                                            <div class="column">
                                                <b-field label="City/Municipality">
                                                    <b-input placeholder="City/Municipality" v-model="nAddresses.city_work"></b-input>
                                                </b-field>
                                            </div><!--close column-->
                                            <div class="column">
                                                <b-field label="District">
                                                    <b-input placeholder="District" v-model="nAddresses.district_work"></b-input>
                                                </b-field>
                                            </div><!--close column-->
                                        </div><!--close columns-->

                                        <!--Street-->
                                            <div class="columns">
                                            <div class="column">
                                                <b-field label="Brgy/Street">
                                                    <b-input placeholder="Brgy/Street" v-model="nAddresses.brgy_work"></b-input>
                                                </b-field>
                                            </div><!--close column-->
                                            <div class="column">
                                                <b-field label="Zipcode">
                                                    <b-input placeholder="Zipcode" v-model="nAddresses.zipcode_work"></b-input>
                                                </b-field>
                                            </div><!--close column-->
                                        </div><!--close columns-->

                                        <hr>
                                        <!--Present Address-->
                                        <div class="title is-5">Present Address</div>
                                        <div class="columns">
                                            <div class="column">
                                                <!-- Country -->
                                                <b-field label="Country">
                                                    <b-input placeholder="Country" v-model="nAddresses.country_perm"></b-input>
                                                </b-field>
                                            </div> <!--close column-->
                                            <div class="column">
                                                <b-field label="Province">
                                                    <b-input placeholder="Province" v-model="nAddresses.province_perm"></b-input>
                                                </b-field>
                                            </div> <!--close column-->
                                        </div> <!--close columns-->

                                        <!--City-->
                                        <div class="columns">
                                            <div class="column">
                                                <b-field label="City/Municipality">
                                                    <b-input placeholder="City/Municipality" v-model="nAddresses.city_perm"></b-input>
                                                </b-field>
                                            </div><!--close column-->
                                            <div class="column">
                                                <b-field label="District">
                                                    <b-input placeholder="District" v-model="nAddresses.district_perm"></b-input>
                                                </b-field>
                                            </div><!--close column-->
                                        </div><!--close columns-->

                                        <!--Street-->
                                            <div class="columns">
                                            <div class="column">
                                                <b-field label="Brgy/Street">
                                                    <b-input placeholder="Brgy/Street" v-model="nAddresses.brgy_perm"></b-input>
                                                </b-field>
                                            </div><!--close column-->
                                            <div class="column">
                                                <b-field label="Zipcode">
                                                    <b-input placeholder="Zipcode" v-model="nAddresses.zipcode_perm"></b-input>
                                                </b-field>
                                            </div><!--close column-->
                                        </div><!--close columns-->
                                    

                                    
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
    </div>
</template>

<script>
export default {
    props: ['addresses'],
    data(){
        return{
            nAddresses: {},
            errors: {},
            addressesJSON: null,
        }
        
    },
    methods: {
      initializeData(){
          this.addressesJSON = JSON.parse(this.addresses);
          this.nAddresses = this.addressesJSON;
          console.log(this.addressesJSON);

      },

      update(){
            axios.put('/panel/address-page/'+this.addressesJSON.address_id, this.nAddresses).then(res=>{
                if(res.data.status === 'updated')
                this.$buefy.dialog.alert({
                    title: 'UPDATED!',
                    message: 'Your profile successfully updated.',
                    type: 'is-success',
                    onConfirm: ()=> window.location='/panel/user-page'
                });
            })

      }
    },//end method
    mounted(){
        this.initializeData();

    }
}
</script>

<style scoped>
  
</style>
