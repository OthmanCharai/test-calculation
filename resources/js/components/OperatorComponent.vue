<script setup>
import { ref } from "vue";

// Define the options for the select component
const options = [
    { label: "+", value: "plus" },
    { label: "-", value: "minus" },
    { label: "*", value: "multiplication" },
    { label: "/", value: "division" },
];

// Define the selected value and emit it when it changes
const selectedValue = ref(null);
defineEmits(["selected:value"]);
</script>
<template>
    <select
        v-model="selectedValue"
        @change="$emit('selected:value', $event.target.value)"
    >
        <option
            v-for="option in options"
            :value="option.value"
            :key="option.value"
        >
            {{ option.label }}
        </option>
    </select>
</template>
<style lang=""></style>
