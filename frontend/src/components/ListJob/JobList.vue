<template>
    <div class=" max-h-64 overflow-y-auto ">
        <div class="mt-2 md:block lg:hidden">
            <button class="collapsible bg-gray-500 text-white" @click="showHideCollapse">{{ title }} </button>
            <div class="content w-full ">
                <p class=" cursor-pointer p-3  hover:bg-slate-100 capitalize" v-for="job of listJobs" :key="job"
                    @click.prevent="selectedValue(job)">{{ job }}</p>
                <p class=" cursor-pointer p-3  hover:bg-slate-100 capitalize text-red-500" v-if="(jobList.length == 0)">
                    Not Found</p>
            </div>
        </div>
        <div class="mt-5 lg:block hidden w-full">
            <ul class="menu bg-base-100 rounded-box drop-shadow-lg w-11/12">
                <p class="bg-gray-600 rounded-2xl p-3 text-white capitalize">{{ title }}</p>
                <!-- spin -->

                <li v-for="job of listJobs" :key="job" @click.prevent="selectedValue(job)"><a class="capitalize ">{{ job
                }}</a> </li>
                <li v-if="(jobList.length == 0 && !isShowForm)"><a class="capitalize text-red-500">Not Found</a></li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    props: ['title', 'jobList'],
    data() {
        return {
            titles: this.title,
            listJobs: this.jobList,
            isShowForm: true,
            count: 0
        }
    },

    watch: {
        jobList: function () {
            this.listJobs = this.jobList
        }
    },

    methods: {
        showHideCollapse() {
            var coll = document.getElementsByClassName("collapsible");
            for (let i = 0; i < coll.length; i++) {
                coll[i].addEventListener("click", function () {
                    this.classList.toggle("active");
                    var content = this.nextElementSibling;
                    if (content.style.maxHeight) {
                        content.style.maxHeight = null;
                    } else {
                        content.style.maxHeight = content.scrollHeight + "px";
                    }
                });
            }
        },

        selectedValue(value) {
            this.$emit('selectedValue', value)
        },

        showForm() {
            setTimeout(() => {
                this.isShowForm = false;
            }, 1500)
        }
    },
    mounted() {
        this.showForm();
    }

}
</script>

<style scoped>
/* Works on Chrome, Edge, and Safari */
*::-webkit-scrollbar {
    width: 12px;
}



div>p,
ul>li {
    box-shadow: rgba(123, 124, 125, 0.25) 0px 4px 8px -2px, rgba(119, 121, 123, 0.08) 0px 0px 0px 1px;
}

.collapsible {
    color: white;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
}


.collapsible:after {
    content: '\002B';
    color: white;
    float: right;
    margin-left: 5px;
}

.active:after {
    content: "\2212";
}

.content {
    max-height: 0;
    overflow: auto;
    transition: max-height 0.2s ease-out;
}
</style>
