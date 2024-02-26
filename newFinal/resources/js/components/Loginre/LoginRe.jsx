import { Box, TextField, Button, Grid } from '@mui/material';
import { useState } from 'react';

import { createRoot } from "react-dom/client"

import './LoginReStyles.css'


const LoginRe = () => {

    const [documento, setDocumento] = useState("");
    const [error, setError] = useState({
        error: false,
        message:""
    });

    const validateDocumento = (documento) => {
        const regex = /^[0-9]{5,11}$/;
        return  regex.test(documento)
    }

    const handleSubmit = (e) => {
        e.preventDefault();

        if(validateDocumento(documento)){
            setError({
                error: false,
                message:""
            })
            console.log('documento correcto')
        } else {
            setError({
                error: true,
                message:"El documento ingresado no es correcto"
            })
        }
    }

    return (
        <div>
            <Box component='form' onSubmit={handleSubmit}
            sx={{
                border: 2,
                padding: 5,
                width: '50%',
                margin: '0 auto',
                bgcolor: 'white',
                color: 'white',
                borderRadius: 5,
                boxShadow: ' 5px 5px 10px rgba(0, 0, 0, 0.3)',
                mt: 20
            }}
            >
                

                <TextField 
                    id="document" 
                    label="Documento" 
                    variant="outlined" 
                    type='text'
                    fullWidth
                    color='success'
                    helperText={error.message}
                    error={error.error}
                    required
                    margin="dense"
                    value={documento}
                    onChange={(e) => setDocumento(e.target.value)}
                    sx={{ '& .MuiFormHelperText-root.Mui-error': { color: 'red' } }} // Estilo para el mensaje de error en rojo
                />

                <TextField 
                    id="password" 
                    label="Contraseña" 
                    variant="outlined"
                    type='text'
                    fullWidth
                    color='success'
                    required
                    sx={{mt: 2}}
                    />
                
                <Button type='submit' variant="outlined" color="success" sx={{mt: 2}}>Continuar</Button>
            </Box>
        </div>
    )
}

export default LoginRe;


if (document.getElementById('root')){
    createRoot(document.getElementById('root')).render(<LoginRe/>)
}