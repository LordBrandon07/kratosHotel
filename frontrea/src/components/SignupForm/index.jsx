import { Button, TextField } from "@mui/material";
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
    <>
        <h1>Inicio De Sesion</h1>
        <form action="" onSubmit={handleSubmit(handleSubmitForm)}>
            <TextField
                id="outlined-basic" 
                label="Documento" 
                variant="outlined" 
                helperText="ingrese un documento valido"
                error={true}
            />
            <TextField
                id="outlined-basic" 
                label="Contraseña" 
                variant="outlined" 
                
            />
        
                <Button type="button" variant="outlined" onClick={handleClearClick}>Clear</Button>
                <Button type="submit" variant="outlined">Submit</Button>
        </form>
    </>
    );
}

export default SignupForm