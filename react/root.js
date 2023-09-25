import { createRoot } from 'react-dom/client'
import { HomePage } from './containers';

const root = createRoot(document.getElementById('react_root'));
root.render(<HomePage />);