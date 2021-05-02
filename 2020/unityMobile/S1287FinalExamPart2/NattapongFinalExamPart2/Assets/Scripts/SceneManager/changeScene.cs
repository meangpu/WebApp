using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class changeScene : MonoBehaviour
{
    public string scenename;

    public void GoToScene()
    {
        SceneManager.LoadScene(scenename);
    }
}
