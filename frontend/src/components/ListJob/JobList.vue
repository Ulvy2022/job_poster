<template>
<div class="mb-5 mt-5">
    <button class="collapsible bg-blue-400" @click="showHideCollapse ">{{title}}</button>
    <div class="content w-full ">
        <p class=" cursor-pointer p-3  hover:bg-slate-100" v-for="job of listJobs" :key="job" >{{job}}</p>
    </div>
</div>
</template>

<script>
export default {
    props: ['title','jobList'],
    data() {
        return {
            titles: this.title,
            listJobs: this.jobList,
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
        }
    }
}
</script>

<style scoped>
div>p{
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

.active,

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