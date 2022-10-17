<template>
    <div class="w-full mt-5 md:grid lg:flex gap-10">
        <div class="lg:w-8/12 md:w-full">
            <div class="w-full flex justify-start ">
                <p class="w-2/4 text-2xl  ml-2">Latest Jobs</p>
            </div>
            <div class="flex w-full gap-10 items-center hover:bg-gray-100 cursor-pointer" id="card">
                <div>
                    <div class="avatar placeholder ml-2">
                        <div class="bg-neutral-focus text-neutral-content rounded-full w-16">
                            <span class="text-3xl">L</span>
                        </div>
                    </div>
                </div>
                <div class="p-3  w-full">
                    <p class="text-blue-500 text-xl lg:text-2xl text-ellipsis ">Learning and Development Manager</p>
                    <p class="text-ellipsis mb-1 text-gray-500">Coffee Concepts (Cambodia) Limited</p>
                    <div class="flex lg:gap-24 gap-7">
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-5 w-5" >
                                <path
                                    d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                            </svg>
                            <p>5-Nov-2022</p>
                        </div>
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5">
                                <path
                                    d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z" />
                            </svg>
                            <p>3 days</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
  
}
</script>

<style scoped>
#card{
    border-top: 1px  black solid;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
}
</style>