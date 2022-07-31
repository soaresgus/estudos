import { useDropzone } from 'react-dropzone'
import { useCallback } from 'react'

import { DropContainer, UploadMessage } from './styles'

export default function Upload({ onUpload }) {
    const onDrop = useCallback((acceptedFiles, rejectFiles) => {
        if (acceptedFiles) {
            onUpload(acceptedFiles);
        }
    }, [])

    const { getRootProps, getInputProps, isDragActive, isDragReject } = useDropzone({
        onDrop,
        accept: {
            'image/*': ['.png'],
            'audio/*': ['.mp3'],
        }
    })

    const renderDragMessage = (isDragActive, isDragReject) => {
        if (!isDragActive) {
            return <UploadMessage>Arraste arquivos aqui...</UploadMessage>
        }

        if (isDragReject) {
            return <UploadMessage type="error">Arquivo não suportado</UploadMessage>
        }

        return <UploadMessage type="success">Solte os arquivos aqui</UploadMessage>
    }

    return (
        <DropContainer
            {...getRootProps()}
            isDragActive={isDragActive}
            isDragReject={isDragReject}
        >
            <input {...getInputProps()} />
            {renderDragMessage(isDragActive, isDragReject)}
        </DropContainer>
    )
}