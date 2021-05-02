using System.Collections;
using UnityEngine;
using Firebase;
using Firebase.Auth;
using Firebase.Database;
using TMPro;
using System.Linq;
using UnityEngine.SceneManagement;

public class GameManager : MonoBehaviour
{

    [Header("Firebase")]
    public DependencyStatus dependencyStatus;
    public FirebaseAuth auth;    
    public DatabaseReference DBreference;
    
    [Header("Score")]
    public int PlayerScore;
    public TMP_Text scoreNumText;
    public TMP_Text highScoreText;

    public TMP_Text Playername;
    public TMP_Text PlayernamePball;
    [Header("Player")]
    public GameObject meangpu;
    public GameObject pBall;
    public GameObject ChooseCharMenu;

    [Header("UserData")]
    public GameObject scoreElement;
    public Transform scoreboardContent;
    public GameObject scoreboardContentPanel;

    public static string nowChar;

    void Awake()
    {
        //Check that all of the necessary dependencies for Firebase are present on the system
        FirebaseApp.CheckAndFixDependenciesAsync().ContinueWith(task =>
        {
            dependencyStatus = task.Result;
            if (dependencyStatus == DependencyStatus.Available)
            {
                //If they are avalible Initialize Firebase
                InitializeFirebase();
            }
            else
            {
                Debug.LogError("Could not resolve all Firebase dependencies: " + dependencyStatus);
            }
        });

        // Debug.Log(FirebaseManager.User.DisplayName);
        Playername.text = FirebaseManager.User.DisplayName;
        PlayernamePball.text = FirebaseManager.User.DisplayName;

    }

    private void Start() 
    {
        highScoreText.text = PlayerPrefs.GetInt("HighScore", 0).ToString();
        pauseGame();
    }

    private void InitializeFirebase()
    {
        Debug.Log("Setting up Firebase Auth");
        auth = FirebaseAuth.DefaultInstance;
        DBreference = FirebaseDatabase.DefaultInstance.RootReference;
        Debug.Log($"auth {auth} db{DBreference}");
    }


    private IEnumerator getUserScoreFromFirebase()
    {
        //Get the currently logged in user data
        var DBTask = DBreference.Child("users").Child(FirebaseManager.User.UserId).GetValueAsync();

        yield return new WaitUntil(predicate: () => DBTask.IsCompleted);

        if (DBTask.Exception != null)
        {
            Debug.LogWarning(message: $"Failed to register task with {DBTask.Exception}");
        }
        else
        {
            //Data has been retrieved
            DataSnapshot snapshot = DBTask.Result;
            int nowScore = int.Parse(snapshot.Child("score").Value.ToString());
            PlayerScore = nowScore;
        }
    }



    private IEnumerator UpdateUserScore()
    {
        var DBTask = DBreference.Child("users").Child(FirebaseManager.User.UserId).Child("score").SetValueAsync(PlayerScore);

        yield return new WaitUntil(predicate: () => DBTask.IsCompleted);

        if (DBTask.Exception != null)
        {
            Debug.LogWarning(message: $"Failed to register task with {DBTask.Exception}");
        }
    }


    private IEnumerator resetUserScore()
    {
        var DBTask = DBreference.Child("users").Child(FirebaseManager.User.UserId).Child("score").SetValueAsync(0);

        yield return new WaitUntil(predicate: () => DBTask.IsCompleted);

        if (DBTask.Exception != null)
        {
            Debug.LogWarning(message: $"Failed to register task with {DBTask.Exception}");
        }
    }

    public void ScoreboardButton()
    {        
        StartCoroutine(LoadScoreboardData());
    }

    private IEnumerator LoadScoreboardData()
    {
        //Get all the users data ordered by kills amount
        var DBTask = DBreference.Child("users").OrderByChild("score").GetValueAsync();

        yield return new WaitUntil(predicate: () => DBTask.IsCompleted);

        if (DBTask.Exception != null)
        {
            Debug.LogWarning(message: $"Failed to register task with {DBTask.Exception}");
        }
        else
        {
            //Data has been retrieved
            DataSnapshot snapshot = DBTask.Result;

            //Destroy any existing scoreboard elements
            foreach (Transform child in scoreboardContent.transform)
            {
                Destroy(child.gameObject);
            }

            //Loop through every users UID
            foreach (DataSnapshot childSnapshot in snapshot.Children.Reverse<DataSnapshot>())
            {
                string username = childSnapshot.Child("username").Value.ToString();
                int score = int.Parse(childSnapshot.Child("score").Value.ToString());

                //Instantiate new scoreboard elements
                GameObject scoreboardElement = Instantiate(scoreElement, scoreboardContent);
                scoreboardElement.GetComponent<ScoreElement>().NewScoreElement(username, score);
            }
        }
    }

    public void updateAllScore()
    {
        // StartCoroutine(getUserScoreFromFirebase());
        StartCoroutine(UpdateUserScore());    
        // Debug.Log("firebaseUpdate!");
    }

    public void updateScoretext()
    {
        scoreNumText.text = PlayerScore.ToString();
    }

    public void gameover()
    {
        checkHighScore();
        pauseGame();
        ScoreboardButton();
        scoreboardContentPanel.SetActive(true);

    }

    public void checkHighScore()
    {
        if (PlayerScore > PlayerPrefs.GetInt("HighScore", 0))
        {
            PlayerPrefs.SetInt("HighScore", PlayerScore);
            highScoreText.text = PlayerScore.ToString();
        }
    }


    public void pauseGame()
    {
        Time.timeScale = 0;
    }

    public void resumeGame()
    {
        Time.timeScale = 1;
    }
               
    public void ChooseMeangpu()
    {
        nowChar = "meangpu";
        Time.timeScale = 1;
        meangpu.SetActive(true);
        pBall.SetActive(false);
        ChooseCharMenu.SetActive(false);
    }

    public void ChoosePball()
    {
        nowChar = "pball";
        Time.timeScale = 1;
        meangpu.SetActive(false);
        pBall.SetActive(true);
        ChooseCharMenu.SetActive(false);
    }

    public void restartgame()
    {
        SceneManager.LoadScene("mainGame");
    }

    public void logOut()
    {
        auth.SignOut();
        SceneManager.LoadScene("FirebaseLogin");
        resumeGame();
    }

}
