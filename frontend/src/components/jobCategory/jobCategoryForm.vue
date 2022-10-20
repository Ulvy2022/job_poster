<template>
    <div class="w-full mt-5  bg-white rounded-sm">
        <div class="w-full p-3 bg-blue-500 text-white lg:text-lg">
            <p>Job Category</p>
        </div>
        <div class=" w-full  justify-start  ">
            <div class="grid grid-cols-2 items-center justify-end p-2 sh w-full bg-gray-100" v-for="index in loop" :key="index" >
                <ul class="menu bg-base-100  w-11/12">
                    <li class="hover-bordered"><a>Accounting</a></li>
                </ul>
                <ul class="menu bg-base-100">
                    <li class="hover-bordered ">
                        <a>Accounting</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    data() {
        return {
            loop:10
        }
    }
}
</script>