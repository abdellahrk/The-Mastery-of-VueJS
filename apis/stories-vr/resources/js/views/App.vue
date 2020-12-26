<template>
    <div>
        <h1>Let's hear some stories</h1>
        <button @click="createStory" class="btn btn-primary">Add a new one?</button>
        <p class="lead">Here's a list of all your stories</p>

        <table class="table table-striped">
            <Stories @callFetch="fetchStories" @deleteStory="storyToDelete(story)"  v-for="story in stories" :story="story" :key="story.id"/>
        </table>

        <!--
        <pre>{{ $data }}</pre>
        -->
    </div>
</template>

<script src="./app.js" type="text/javascript"></script>
