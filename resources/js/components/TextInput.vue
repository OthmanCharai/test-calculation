<script setup>
import { onMounted, ref } from "vue";

// Propes
const props = defineProps({
    modelValue: String,
});

// define an emits that should fire after input value updated
defineEmits(["update:modelValue"]);

//define input ref
const input = ref(null);

// Check if the input has attribute
onMounted(() => {
    if (input.value?.hasAttribute("autofocus")) {
        input.value?.focus();
    }
});

// Define Expose
defineExpose({ focus: () => input.value?.focus() });
</script>

<template>
    <input
        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
        :value="modelValue"
        @change="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>
