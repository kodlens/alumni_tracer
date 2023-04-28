<template>
    <div>
        <div class="section">
            <div class="columns">
                <div class="column is-10 is-offset-1">

                    <div class="level">
                        <div class="level-left">
                            <div class="level-item">
                                <b-field label="Search">
                                    <b-input v-model="search" placeholder="Seach Lastname..." @keyup.native.enter="loadAsyncData"/>
                                </b-field>
                            </div>
                        </div>
                    </div>
                     <b-table
                        :data="data"
                        :loading="loading"
                        paginated
                        backend-pagination
                        :total="total"
                        :per-page="perPage"
                        @page-change="onPageChange"
                        aria-next-label="Next page"
                        aria-previous-label="Previous page"
                        aria-page-label="Page"
                        :show-detail-icon=true
                        aria-current-label="Current page"
                        :default-sort-direction="defaultSortDirection"
                        @sort="onSort">

                        <b-table-column field="user_id" label="ID" v-slot="props">
                                {{ props.row.user_id }}
                        </b-table-column>

                        <b-table-column field="fullname" label="Name" v-slot="props">
                                 {{ props.row.lname }} , {{ props.row.fname }}  {{ props.row.mname }} , {{ props.row.suffix }} 
                                <!--Suffix, Alab , Marvilowe Toraja-->
                        </b-table-column>

                        <b-table-column field="sex" label="Sex" v-slot="props">
                                {{ props.row.sex }}
                        </b-table-column>
                        <b-table-column field="civil_status" label="Civil Status" v-slot="props">
                                {{ props.row.civil_status }}
                        </b-table-column>
                         <b-table-column field="program" label="Program" v-slot="props">
                             {{ props.row.program }}
                         </b-table-column>

                         <b-table-column field="year_graduated" label="Year Graduated" v-slot="props">
                             {{ props.row.year_graduated }}
                         </b-table-column>

                        <b-table-column field="role" label="Role" v-slot="props">
                                {{ props.row.role }}
                        </b-table-column>

                        <b-table-column field="" label="Action" v-slot="props">
                            <div class="buttons">
                                <b-dropdown position="is-bottom-right" aria-role="list" class="mr-1">
                                        <template #trigger>
                                            <b-button
                                            label="EDIT PROFILE"
                                            type="is-link"
                                            class="is-small"
                                            icon-right ="menu-down"/>
                                        </template>
                                        <b-dropdown-item tag="a" :href="`/panel/user-page/`+props.row.user_id+`/edit`"><b-icon pack="fa" icon="user"></b-icon>Personal Information</b-dropdown-item>
                                        <b-dropdown-item tag="a" :href="`/panel/user-education-page/`+props.row.user_id">
                                            <b-icon pack="fa" icon="graduation-cap"></b-icon>Educational Information
                                        </b-dropdown-item>
                                        
                                        <b-dropdown-item tag="a" :href="`/panel/user-eligibility-page/`+props.row.user_id">
                                            <b-icon pack="fa" icon="file-text-o"></b-icon>
                                            Eligibility
                                        </b-dropdown-item>
                                        <b-dropdown-item tag="a" :href="`/panel/address-page/`+props.row.user_id+`/edit`">
                                            <b-icon pack="fa" icon="map-marker"></b-icon>
                                            Addresses
                                        </b-dropdown-item>

                                        <b-dropdown-item tag="a" :href="`/panel/employment-page/`+props.row.user_id+`/edit`">
                                        <b-icon pack="fa" icon="users"></b-icon>
                                            Employment Information
                                        </b-dropdown-item>
                                        <b-dropdown-item
                                            @click="confirmDelete(props.row.user_id)">
                                            <b-icon pack="fa" icon='trash'></b-icon>
                                            Delete
                                        </b-dropdown-item>
                                    </b-dropdown>

                                    <button class="button is-small is-success is-outlined" @click="modalReset(props.row.user_id)">
                                    <i class="fa fa-refresh"></i>&nbsp;&nbsp;
                                    RESET
                                </button>
                            </div>
                        </b-table-column>

                    </b-table>

                        <div class="class buttons">
                            <a class="button is-success" href="/panel/user-page/create">
                            <i class="fa fa-user-plus"></i>&nbsp;&nbsp;ADD USER</a>
                        </div>

                </div> <!--Close Column-->
            </div> <!--Close Columns-->
        </div> <!--Close Section-->


                <!-- Modal -->
            <b-modal v-model="isModalReset" has has-modal-card
            trap-focus width="640" aria-role="dialog" aria-modal>

            <form @submit.prevent="submitPasswordReset">
             <div class="modal-card">

                  <header class="modal-card-head">
                    <p class="modal-card-title">Reset Password</p>
                    <button type="button" class="delete"
                    @click = "isModalReset = false"/>
                 </header>

                <section class="modal-card-body">
                    <div>
                        <b-field label="New Password">
                            <b-input type="password" password-reveal v-model="fields.password" placeholder="New Password" required></b-input>
                        </b-field>
                    </div>
                </section>

                <footer class="modal-card-foot">
                    <b-button
                        label="Close"
                    @click="isModalReset = false"></b-button>

                    <button
                        class="button is-success">
                    SAVE
                    </button>
                </footer>

             </div>
            </form>



            </b-modal>

    </div> <!--end root div-->
</template>

<script>
export default {
    data(){
        return{
            data: [],
            total: 0,
            loading: false,
            sortField: 'user_id',
            sortOrder: 'desc',
            page: 1,
            perPage: 20,
            defaultSortDirection: '',
            search: '',
            isModalReset: false,

            fields: {},

            globalId: 0,
        }
    },
    methods:{

        loadAsyncData(){
            const params = [
                `sort_by=${this.sortField}.${this.sortOrder}`,
                `perpage=${this.perPage}`,
                `page=${this.page}`,
                `lname=${this.search}`
            ].join('&');

             this.loading = true;

             axios.get(`/ajax-user-page?${params}`).then(({data})=>{
                 this.data=[];
                 let currentTotal = data.Total;
                 if(data.total / this.perPage > 1000){
                     currentTotal = this.perPage * 1000
                 }
                 this.total = currentTotal;
                 data.data.forEach((item)=>{
                     this.data.push(item);

                 });
                  this.loading = false
             })

             .catch((error) => {
                    this.data = []
                    this.total = 0
                    this.loading = false
                    throw error
                    });


        },
         onPageChange(page) {
            this.page = page
            this.loadAsyncData();
        },

        onSort(field, order) {
            this.sortField = field
            this.sortOrder = order
            this.loadAsyncData();
        },
         setPerPage(){
            this.loadAsyncData();
        },
        getData(dataId){
                axios.get('/panel/user-page'+ dataId).then(res=>{
                this.fields = res.data;

            })
        },
        // modalOpen(dataId){

        //      this.isModalAnnouncement = true;
        //      this.globalId = dataId;
        //     if(dataId > 0){
        //         this.getData(dataId);
        //     }

        // },

        modalReset(dataId){
            this.isModalReset = true;
            this.globalId = dataId;
        },
        submitPasswordReset(){
                 axios.put(`/panel/user-reset-password/`+this.globalId, this.fields).then(res=>{
                            this.globalId = 0;
                            this.fields={};
                            this.isModalReset = false;

                    if(res.data.status === 'updated'){
                            alert('Password Successfully Changed.');
                            this.loadAsyncData();
                            this.isModalReset = false;
                     }

            });
        },
        submit(){
            if (this.globalId > 0){
                //update

                 axios.put(`/panel/user-page/`+this.globalId, this.fields).then(res=>{
                     this.globalId = 0;
                        this.fields={};
                       this.isModalAnnouncement = false;
                       this.loadAsyncData();
            });

            }else{
                //insert

                 axios.post(`/panel/user-page`, this.fields).then(res=>{
                        this.fields={};
                       this.isModalAnnouncement = false;
                       this.loadAsyncData();
            });

            }

        },

        confirmDelete(dataId){
            this.$buefy.dialog.confirm({
                title: 'DELETE?',
                message: 'Are you sure you want to delete this data?',
                type: 'is-danger',
                onConfirm: ()=> this.submitDelete(dataId)
            })
        },
        submitDelete(dataId){
            axios.delete(`/panel/user-page/` + dataId).then(res=>{
                if(res.data.status === 'deleted'){
                    alert('Account Successfully Deleted!');
                    this.loadAsyncData();
                }

            });
        },
    }, //close method


    mounted(){
        this.loadAsyncData();
    },

}
</script>
