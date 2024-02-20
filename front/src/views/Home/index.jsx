import { TextField } from "@mui/material";
import { useState } from "react";
import React from "react";
import { useForm } from "react-hook-form";


const SignupForm = () => {
    const { register, handleSubmit, reset, formState: {errors} } = useForm();

    const handleClearClick = () => {
        reset();
    }

    const handleSubmitForm = (data) => {
        console.log(data)   
    }

    return (
        
        <TextField id="outlined-basic" label="Outlined" variant="outlined" />
    );
}

export default SignupForm