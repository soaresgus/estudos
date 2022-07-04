import { Container, FileInfo, Preview } from './style'
import { CircularProgressbar } from 'react-circular-progressbar';
import { MdAlignHorizontalRight, MdCheckCircle, MdError, MdLink } from 'react-icons/md'

export function FileList() {
    return (
        <Container>
            <li>
                <FileInfo>
                    <Preview src="https://source.unsplash.com/random" />
                    <div>
                        <strong>imagem.png</strong>
                        <span>20kb <button>Excluir</button></span>
                    </div>
                </FileInfo>

                <div>
                    <CircularProgressbar
                        styles={{
                            root: { width: 24 },
                            path: { stroke: '#7159c1' }
                        }}
                        strokeWidth={10}
                        value={66}
                    />

                    <a
                        href='#'
                        target='_blank'
                        rel="noopener noreferrer"
                    >
                        <MdLink style={{ marginRight: 8 }} size={24} color="#222" />
                    </a>

                    <MdCheckCircle size={24} color="#78e5d5" />
                    <MdError size={24} color="#e57878" />

                </div>
            </li>
        </Container>
    )
}